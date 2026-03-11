<?php
// CertificationController
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index()
    {
        return view('admin.pages.certifications.index', ['certifications' => Certification::orderBy('sort_order')->get()]);
    }
    public function create()
    {
        return view('admin.pages.certifications.form', ['cert' => new Certification()]);
    }
    public function store(Request $request)
    {
        Certification::create($request->validate(['title' => 'required', 'issuer' => 'required', 'certificate_url' => 'nullable|url', 'icon' => 'required', 'issued_date' => 'nullable|date', 'sort_order' => 'integer']));
        return redirect()->route('admin.certifications.index')->with('success', 'Certification added.');
    }
    public function edit(Certification $certification)
    {
        return view('admin.pages.certifications.form', ['cert' => $certification]);
    }
    public function update(Request $request, Certification $certification)
    {
        $certification->update($request->validate(['title' => 'required', 'issuer' => 'required', 'certificate_url' => 'nullable|url', 'icon' => 'required', 'issued_date' => 'nullable|date', 'sort_order' => 'integer']));
        return redirect()->route('admin.certifications.index')->with('success', 'Certification updated.');
    }
    public function destroy(Certification $certification)
    {
        $certification->delete();
        return back()->with('success', 'Deleted.');
    }
}
