<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home', [
            'projects' => Project::query()->where('is_active', true)->where('is_featured', true)->orderBy('sort_order')->take(6)->get(),
            'services' => Service::query()->where('is_active', true)->orderBy('sort_order')->take(6)->get(),
        ]);
    }
}
