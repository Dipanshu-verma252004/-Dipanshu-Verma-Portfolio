<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display the services page.
     */
    public function index()
    {
        return view('frontend.services');
    }
}
