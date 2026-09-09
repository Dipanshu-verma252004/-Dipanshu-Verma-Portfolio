<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * The skill data grouped by category slug.
     *
     * @var array
     */
    protected $data = [
        'frontend' => [
            'HTML' => ['icon' => 'bi-file-code', 'experience' => '3+ years'],
            'CSS' => ['icon' => 'bi-palette', 'experience' => '3+ years'],
            'JavaScript' => ['icon' => 'bi-code-square', 'experience' => '2+ years'],
            'Bootstrap' => ['icon' => 'bi-bootstrap', 'experience' => '3+ years'],
            'jQuery' => ['icon' => 'bi-braces', 'experience' => '2+ years'],
            'AJAX' => ['icon' => 'bi-arrow-repeat', 'experience' => '2+ years'],
        ],
        'backend' => [
            'PHP' => ['icon' => 'bi-filetype-php', 'experience' => '3+ years'],
            'Laravel' => ['icon' => 'bi-terminal', 'experience' => '2+ years'],
            'CodeIgniter' => ['icon' => 'bi-code-slash', 'experience' => '1+ years'],
            'REST API' => ['icon' => 'bi-plug', 'experience' => '1+ years'],
        ],
        'database' => [
            'MySQL' => ['icon' => 'bi-database', 'experience' => '3+ years'],
        ],
        'tools-version-control' => [
            'Git' => ['icon' => 'bi-git', 'experience' => '3+ years'],
            'GitHub' => ['icon' => 'bi-github', 'experience' => '3+ years'],
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->data as $categorySlug => $skills) {
            $category = SkillCategory::query()->where('slug', $categorySlug)->first();

            if ($category === null) {
                continue;
            }

            $sortOrder = 0;

            foreach ($skills as $name => $attributes) {
                $sortOrder++;

                Skill::query()->updateOrCreate(
                    [
                        'skill_category_id' => $category->id,
                        'name' => $name,
                    ],
                    [
                        'name' => $name,
                        'icon' => $attributes['icon'],
                        'experience' => $attributes['experience'],
                        'sort_order' => $sortOrder,
                        'is_active' => true,
                    ],
                );
            }
        }
    }
}
