<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    /**
     * Display the experience page.
     */
    public function index()
    {
        return view('frontend.experience');
    }
}
