<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\SkillCategory;

class AboutController extends Controller
{
    public function index()
    {
        return view('frontend.about', [
            'about' => About::query()->where('is_active', true)->latest('id')->first(),
            'skillCategories' => SkillCategory::query()->where('is_active', true)->with(['skills' => fn ($q) => $q->where('is_active', true)->orderBy('sort_order')])->orderBy('sort_order')->get(),
        ]);
    }
}
