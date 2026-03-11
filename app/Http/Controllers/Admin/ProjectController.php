<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::orderBy('sort_order')->get();
        return view('admin.pages.projects.index', compact('projects'));
    }

    public function create() {
        return view('admin.pages.projects.form', ['project' => new Project()]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'required|string|max:500',
            'tech_stack' => 'required|string',
            'github_url' => 'nullable|url',
            'live_url' => 'nullable|url',
            'category' => 'required|in:laravel,php,api,government,other',
            'is_featured' => 'boolean',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $data['tech_stack'] = array_filter(array_map('trim', explode(',', $data['tech_stack'])));
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('projects', 'public');
        }

        Project::create($data);
        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project) {
        return view('admin.pages.projects.form', compact('project'));
    }

    public function update(Request $request, Project $project) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'required|string|max:500',
            'tech_stack' => 'required|string',
            'github_url' => 'nullable|url',
            'live_url' => 'nullable|url',
            'category' => 'required|in:laravel,php,api,government,other',
            'is_featured' => 'boolean',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $data['tech_stack'] = array_filter(array_map('trim', explode(',', $data['tech_stack'])));
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('thumbnail')) {
            if ($project->thumbnail) Storage::disk('public')->delete($project->thumbnail);
            $data['thumbnail'] = $request->file('thumbnail')->store('projects', 'public');
        }

        $project->update($data);
        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project) {
        if ($project->thumbnail) Storage::disk('public')->delete($project->thumbnail);
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }

    public function toggleFeatured(Project $project) {
        $project->update(['is_featured' => !$project->is_featured]);
        return back()->with('success', 'Project featured status updated.');
    }
}
