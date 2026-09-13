<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        return view('frontend.experience', [
            'experiences' => Experience::query()->where('is_active', true)->orderByDesc('start_date')->orderBy('sort_order')->get(),
        ]);
    }
}
