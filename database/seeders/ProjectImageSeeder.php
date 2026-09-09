<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;

class ProjectImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            ['project' => 'inventory-management-system', 'slug' => 'dashboard', 'alt' => 'Inventory dashboard'],
            ['project' => 'inventory-management-system', 'slug' => 'products', 'alt' => 'Product listing page'],
            ['project' => 'pathology-management-system', 'slug' => 'reports', 'alt' => 'Pathology report preview'],
            ['project' => 'ngo-website', 'slug' => 'home', 'alt' => 'NGO website homepage'],
            ['project' => 'online-examination-system', 'slug' => 'exam', 'alt' => 'Online exam screen'],
            ['project' => 'online-voting-system', 'slug' => 'ballot', 'alt' => 'Voting ballot screen'],
        ];

        foreach ($images as $image) {
            $project = Project::query()->where('slug', $image['project'])->first();

            if ($project === null) {
                continue;
            }

            ProjectImage::query()->updateOrCreate(
                [
                    'project_id' => $project->id,
                    'image' => "images/projects/{$image['project']}/{$image['slug']}.webp",
                ],
                [
                    'image' => "images/projects/{$image['project']}/{$image['slug']}.webp",
                    'alt_text' => $image['alt'],
                    'sort_order' => 1,
                ],
            );
        }
    }
}
