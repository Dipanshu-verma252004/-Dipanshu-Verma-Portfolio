<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Rohit Sharma',
                'designation' => 'Owner',
                'company' => 'Inventory Client',
                'image' => null,
                'message' => 'Dipanshu delivered our inventory system on time and communicated clearly throughout. The application has been stable and easy for our staff to use every day.',
                'rating' => 5,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Anita Deshmukh',
                'designation' => 'Lab Manager',
                'company' => 'Pathology Lab',
                'image' => null,
                'message' => 'The pathology management system simplified how we handle patient records and reports. The report templates saved us hours of manual work each week.',
                'rating' => 5,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Neha Gupta',
                'designation' => 'Coordinator',
                'company' => 'NGO',
                'image' => null,
                'message' => 'Our NGO website is exactly what we needed. The admin panel lets our team update programs and events ourselves without depending on a developer.',
                'rating' => 4,
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::query()->updateOrCreate(
                ['name' => $testimonial['name']],
                $testimonial,
            );
        }
    }
}
