<?php
// app/Http/Controllers/PortfolioController.php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Certification;
use App\Models\Experience;
use App\Models\AdminUser;

class PortfolioController extends Controller
{
    public function index()
    {
        $admin = AdminUser::first();
        if ($admin) $admin->increment('profile_views');

        $projects = Project::orderBy('sort_order')->get();
        $certifications = Certification::orderBy('sort_order')->get();
        $experiences = Experience::orderBy('sort_order')->get();
 
        return view('pages.home', compact('projects', 'certifications', 'experiences', 'admin'));
    }

    public function downloadResume()
    {
        $admin = AdminUser::first();
        if ($admin && $admin->resume_pdf) {
            $path = storage_path('app/public/' . $admin->resume_pdf);
            if (file_exists($path)) {
                return response()->download($path, 'Vikash_Kumar_Resume.pdf');
            }
        }
        // Return the uploaded resume
        $resumePath = base_path('../mnt/user-data/uploads/vikash_Résumé_29_01.pdf');
        if (file_exists($resumePath)) {
            return response()->download($resumePath, 'Vikash_Kumar_Resume.pdf');
        }
        abort(404, 'Resume not found');
    }
}
