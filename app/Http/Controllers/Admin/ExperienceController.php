<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        return view('admin.experience.index', ['experiences' => Experience::query()->orderBy('sort_order')->orderByDesc('start_date')->paginate(10)]);
    }

    public function create()
    {
        return view('admin.experience.form', ['experience' => new Experience()]);
    }

    public function store(Request $request)
    {
        Experience::create($this->validated($request));
        return redirect()->route('admin.experience.index')->with('success', 'Experience added successfully.');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experience.form', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $experience->update($this->validated($request));
        return redirect()->route('admin.experience.index')->with('success', 'Experience updated successfully.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return back()->with('success', 'Experience deleted successfully.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'company_name' => ['required','string','max:150'],
            'designation' => ['required','string','max:150'],
            'location' => ['nullable','string','max:150'],
            'employment_type' => ['nullable','string','max:100'],
            'start_date' => ['required','date'],
            'end_date' => ['nullable','date','after_or_equal:start_date'],
            'description' => ['nullable','string'],
            'technologies' => ['nullable','string'],
            'sort_order' => ['nullable','integer','min:0'],
            'is_current' => ['nullable','boolean'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['technologies'] = !empty($data['technologies']) ? array_values(array_filter(array_map('trim', preg_split('/[,\n]+/', $data['technologies'])))) : [];
        $data['is_current'] = $request->boolean('is_current');
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        if ($data['is_current']) $data['end_date'] = null;
        return $data;
    }
}
