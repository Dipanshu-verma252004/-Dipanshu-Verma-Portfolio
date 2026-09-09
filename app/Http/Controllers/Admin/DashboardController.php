<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContactMessage;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        return view('admin.dashboard', [
            'stats' => [
                'projects' => Project::query()->count(),
                'skills' => Skill::query()->count(),
                'experiences' => Experience::query()->count(),
                'blogs' => Blog::query()->count(),
                'testimonials' => Testimonial::query()->count(),
                'unread_messages' => ContactMessage::query()->where('status', 'new')->count(),
            ],
            'recent_projects' => Project::query()
                ->orderByDesc('updated_at')
                ->limit(5)
                ->get(),
            'recent_messages' => ContactMessage::query()
                ->orderByDesc('created_at')
                ->limit(5)
                ->get(),
        ]);
    }
}
