<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Display the about page.
     */
    public function index()
    {
        return view('frontend.about');
    }
}
