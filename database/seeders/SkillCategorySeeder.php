<?php

namespace Database\Seeders;

use App\Models\SkillCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SkillCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Frontend',
            'Backend',
            'Database',
            'Tools & Version Control',
        ];

        $sortOrder = 0;

        foreach ($categories as $name) {
            $sortOrder++;

            SkillCategory::query()->updateOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'slug' => Str::slug($name),
                    'sort_order' => $sortOrder,
                    'is_active' => true,
                ],
            );
        }
    }
}
