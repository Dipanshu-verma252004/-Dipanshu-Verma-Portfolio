<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.projects.index', ['projects' => Project::query()->orderBy('sort_order')->latest('id')->paginate(15)]);
    }

    public function create()
    {
        return view('admin.projects.form', ['project' => new Project(), 'pageTitle' => 'Add Project']);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['technologies'] = $this->technologies($data['technologies'] ?? '');
        Project::create($data);
        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.form', ['project' => $project, 'pageTitle' => 'Edit Project']);
    }

    public function update(Request $request, Project $project)
    {
        $data = $this->validated($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['technologies'] = $this->technologies($data['technologies'] ?? '');
        $project->update($data);
        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required','string','max:180'],
            'slug' => ['nullable','string','max:180'],
            'short_description' => ['required','string','max:500'],
            'description' => ['nullable','string'],
            'project_type' => ['nullable','string','max:100'],
            'client_name' => ['nullable','string','max:150'],
            'role' => ['nullable','string','max:150'],
            'start_date' => ['nullable','date'],
            'end_date' => ['nullable','date'],
            'live_url' => ['nullable','url','max:500'],
            'github_url' => ['nullable','url','max:500'],
            'technologies' => ['nullable','string','max:1000'],
            'challenges' => ['nullable','string'],
            'solution' => ['nullable','string'],
            'is_featured' => ['nullable','boolean'],
            'is_active' => ['nullable','boolean'],
            'sort_order' => ['nullable','integer','min:0'],
        ]);
    }

    private function technologies(string $value): array
    {
        return array_values(array_filter(array_map('trim', preg_split('/[,\n]+/', $value))));
    }
}
