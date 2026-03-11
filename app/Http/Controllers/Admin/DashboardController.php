<?php
// app/Http/Controllers/Admin/DashboardController.php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{Project, Certification, Message, AdminUser, Experience};

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects' => Project::count(),
            'certifications' => Certification::count(),
            'messages' => Message::count(),
            'unread_messages' => Message::where('is_read', false)->count(),
            'profile_views' => AdminUser::first()?->profile_views ?? 0,
            'experiences' => Experience::count(),
        ];
        $recentMessages = Message::latest()->take(5)->get();
        return view('admin.pages.dashboard', compact('stats', 'recentMessages'));
    }
}
