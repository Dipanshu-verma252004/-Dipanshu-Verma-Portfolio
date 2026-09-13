<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::query()->firstOrCreate([], [
            'name' => 'Dipanshu Verma',
            'designation' => 'PHP / Laravel Developer',
            'is_active' => true,
        ]);

        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'designation' => ['required', 'string', 'max:150'],
            'short_description' => ['nullable', 'string', 'max:1000'],
            'description' => ['nullable', 'string'],
            'profile_image' => ['nullable', 'string', 'max:500'],
            'resume_file' => ['nullable', 'string', 'max:500'],
            'email' => ['nullable', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:30'],
            'location' => ['nullable', 'string', 'max:150'],
            'years_experience' => ['nullable', 'integer', 'min:0'],
            'projects_count' => ['nullable', 'integer', 'min:0'],
            'clients_count' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        About::query()->firstOrCreate([], $validated)->update($validated);

        return back()->with('success', 'About profile updated successfully.');
    }
}
