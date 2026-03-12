<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index() { return view('admin.pages.experience.index', ['experiences' => Experience::orderBy('sort_order')->get()]); }
    public function create() { return view('admin.pages.experience.form', ['experience' => new Experience()]); }
    public function store(Request $request) {
        $data = $request->validate(['title'=>'required','company'=>'required','location'=>'required','start_date'=>'required|date','end_date'=>'nullable|date','is_current'=>'boolean','responsibilities'=>'required|string','sort_order'=>'integer']);
        $data['responsibilities'] = array_filter(array_map('trim', explode("\n", $data['responsibilities'])));
        $data['is_current'] = $request->boolean('is_current');
        Experience::create($data);
        return redirect()->route('admin.experience.index')->with('success','Experience added.');
    }
    public function edit(Experience $experience) { return view('admin.pages.experience.form', compact('experience')); }
    public function update(Request $request, Experience $experience) {
        $data = $request->validate(['title'=>'required','company'=>'required','location'=>'required','start_date'=>'required|date','end_date'=>'nullable|date','is_current'=>'boolean','responsibilities'=>'required|string','sort_order'=>'integer']);
        $data['responsibilities'] = array_filter(array_map('trim', explode("\n", $data['responsibilities'])));
        $data['is_current'] = $request->boolean('is_current');
        $experience->update($data);
        return redirect()->route('admin.experience.index')->with('success','Experience updated.');
    }
    public function destroy(Experience $experience) { $experience->delete(); return back()->with('success','Deleted.'); }
}
