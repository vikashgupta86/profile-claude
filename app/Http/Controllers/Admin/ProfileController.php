<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash, Storage};

class ProfileController extends Controller
{
    public function index() { return view('admin.pages.profile', ['admin' => Auth::guard('admin')->user()]); }

    public function update(Request $request) {
        $admin = Auth::guard('admin')->user();
        $data = $request->validate([
            'name'=>'required','email'=>'required|email',
            'bio'=>'nullable|string','phone'=>'nullable','location'=>'nullable',
            'github_url'=>'nullable|url','linkedin_url'=>'nullable|url','email_contact'=>'nullable|email',
            'photo'=>'nullable|image|max:2048','resume_pdf'=>'nullable|file|mimes:pdf|max:5120',
        ]);
        if ($request->hasFile('photo')) {
            if ($admin->photo) Storage::disk('public')->delete($admin->photo);
            $data['photo'] = $request->file('photo')->store('profile','public');
        }
        if ($request->hasFile('resume_pdf')) {
            if ($admin->resume_pdf) Storage::disk('public')->delete($admin->resume_pdf);
            $data['resume_pdf'] = $request->file('resume_pdf')->store('resume','public');
        }
        $admin->update($data);
        return back()->with('success','Profile updated.');
    }

    public function updatePassword(Request $request) {
        $request->validate(['current_password'=>'required','password'=>'required|min:8|confirmed']);
        $admin = Auth::guard('admin')->user();
        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password'=>'Current password is incorrect.']);
        }
        $admin->update(['password'=>Hash::make($request->password)]);
        return back()->with('success','Password updated.');
    }
}
