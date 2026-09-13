<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        return view('frontend.services', [
            'services' => Service::query()->where('is_active', true)->orderBy('sort_order')->get(),
        ]);
    }
}
