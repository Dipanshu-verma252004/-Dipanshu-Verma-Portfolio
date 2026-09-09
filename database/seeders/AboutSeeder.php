<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::query()->updateOrCreate(
            ['email' => 'hello@dipanshuverma.dev'],
            [
                'name' => 'Dipanshu Verma',
                'designation' => 'PHP & Laravel Developer',
                'short_description' => 'PHP & Laravel Developer crafting clean, scalable web applications with Laravel, MySQL, Bootstrap, and vanilla JavaScript.',
                'description' => "I'm Dipanshu Verma, a PHP & Laravel developer who enjoys turning business requirements into reliable, maintainable web applications. I have hands-on experience building inventory, pathology, NGO, examination, and voting systems using Laravel and CodeIgniter with MySQL, Bootstrap, jQuery, and AJAX.\n\nI focus on writing clean, well-structured code, following Laravel conventions, and delivering features that are easy to maintain and extend. I'm always learning and enjoy taking ownership of projects from database design through deployment.",
                'profile_image' => 'images/about/profile.webp',
                'resume_file' => 'files/resume-dipanshu-verma.pdf',
                'email' => 'hello@dipanshuverma.dev',
                'phone' => '+91 98765 43210',
                'location' => 'India',
                'years_experience' => 3,
                'projects_count' => 5,
                'clients_count' => 3,
                'is_active' => true,
            ],
        );
    }
}
