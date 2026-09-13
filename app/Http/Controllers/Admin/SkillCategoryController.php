<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SkillCategoryController extends Controller
{
    public function index()
    {
        $categories = SkillCategory::withCount('skills')->orderBy('sort_order')->orderByDesc('id')->paginate(10);
        return view('admin.skills.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.skills.form', ['category' => new SkillCategory()]);
    }

    public function store(Request $request)
    {
        SkillCategory::create($this->validated($request));
        return redirect()->route('admin.skills.index')->with('success', 'Skill category created successfully.');
    }

    public function edit(SkillCategory $skill)
    {
        return view('admin.skills.form', ['category' => $skill]);
    }

    public function update(Request $request, SkillCategory $skill)
    {
        $skill->update($this->validated($request));
        return redirect()->route('admin.skills.index')->with('success', 'Skill category updated successfully.');
    }

    public function destroy(SkillCategory $skill)
    {
        $skill->skills()->delete();
        $skill->delete();
        return back()->with('success', 'Skill category deleted successfully.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required','string','max:100'],
            'sort_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['slug'] = Str::slug($data['name']);
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');
        return $data;
    }
}
