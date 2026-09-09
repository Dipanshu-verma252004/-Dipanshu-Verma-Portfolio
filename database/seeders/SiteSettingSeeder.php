<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['site_name' => 'Dipanshu Verma'],
            ['site_tagline' => 'PHP & Laravel Developer'],
            ['site_description' => 'Professional portfolio of Dipanshu Verma, a PHP & Laravel Developer building modern, scalable web applications.'],
            ['contact_email' => 'hello@dipanshuverma.dev'],
            ['contact_phone' => '+91 98765 43210'],
            ['contact_location' => 'India'],
            ['social_github' => 'https://github.com/dipanshuverma'],
            ['social_linkedin' => 'https://www.linkedin.com/in/dipanshuverma'],
            ['social_twitter' => 'https://x.com/dipanshuverma'],
        ];

        foreach ($settings as $setting) {
            foreach ($setting as $key => $value) {
                SiteSetting::query()->updateOrCreate(
                    ['key' => $key],
                    ['value' => $value],
                );
            }
        }
    }
}
