<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Company names are kept intentionally generic since the employer's brand
     * was not confirmed inside this project.
     */
    public function run(): void
    {
        $experiences = [
            [
                'company_name' => 'Software Development Company',
                'designation' => 'PHP Developer',
                'location' => 'India',
                'employment_type' => 'Full-time',
                'start_date' => '2023-04-01',
                'end_date' => null,
                'is_current' => true,
                'description' => 'Working as a PHP developer building and maintaining web applications using Laravel and CodeIgniter with MySQL, Bootstrap, jQuery, and AJAX.',
                'technologies' => ['PHP', 'Laravel', 'CodeIgniter', 'MySQL', 'Bootstrap', 'jQuery', 'AJAX'],
                'sort_order' => 1,
                'is_active' => true,
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::query()->updateOrCreate(
                [
                    'company_name' => $experience['company_name'],
                    'designation' => $experience['designation'],
                ],
                $experience,
            );
        }
    }
}
