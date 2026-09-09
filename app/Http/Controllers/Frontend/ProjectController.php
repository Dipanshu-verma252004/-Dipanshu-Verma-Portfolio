<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index()
    {
        return view('frontend.projects', [
            'projects' => Project::query()->where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }

    /**
     * Display the specified project.
     */
    public function show(Project $project)
    {
        return view('frontend.project', [
            'project' => $project,
        ]);
    }
}
