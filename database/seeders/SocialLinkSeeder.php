<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $links = [
            [
                'platform' => 'GitHub',
                'label' => 'GitHub',
                'url' => 'https://github.com/dipanshuverma',
                'icon' => 'bi-github',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'platform' => 'LinkedIn',
                'label' => 'LinkedIn',
                'url' => 'https://www.linkedin.com/in/dipanshuverma',
                'icon' => 'bi-linkedin',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'platform' => 'X (Twitter)',
                'label' => 'X',
                'url' => 'https://x.com/dipanshuverma',
                'icon' => 'bi-twitter-x',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'platform' => 'Email',
                'label' => 'Email',
                'url' => 'mailto:hello@dipanshuverma.dev',
                'icon' => 'bi-envelope',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($links as $link) {
            SocialLink::query()->updateOrCreate(
                ['platform' => $link['platform']],
                $link,
            );
        }
    }
}
