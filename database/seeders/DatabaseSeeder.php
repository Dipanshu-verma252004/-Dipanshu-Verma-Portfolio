<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            SiteSettingSeeder::class,
            AboutSeeder::class,
            SocialLinkSeeder::class,
            SkillCategorySeeder::class,
            SkillSeeder::class,
            ExperienceSeeder::class,
            ServiceSeeder::class,
            ProjectSeeder::class,
            ProjectImageSeeder::class,
            TestimonialSeeder::class,
            BlogCategorySeeder::class,
            BlogSeeder::class,
            ContactMessageSeeder::class,
        ]);
    }
}
