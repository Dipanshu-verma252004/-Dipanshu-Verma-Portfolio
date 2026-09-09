<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Custom Web Application Development',
                'slug' => 'custom-web-application-development',
                'icon' => 'bi-code-slash',
                'short_description' => 'Tailored web applications built with Laravel for inventory, examinations, voting, and other business needs.',
                'description' => 'I design and build custom web applications with Laravel, covering database design, authentication, role-based access, admin panels, REST APIs, and clean, maintainable code that follows Laravel conventions.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Website Development',
                'slug' => 'website-development',
                'icon' => 'bi-globe',
                'short_description' => 'Fast, responsive websites for companies, NGOs, and portfolios using PHP, MySQL, and Bootstrap 5.',
                'description' => 'From company websites to NGO portals, I build responsive, SEO-friendly websites with an easy-to-use admin panel so non-technical teams can manage their own content.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Management Systems',
                'slug' => 'management-systems',
                'icon' => 'bi-diagram-3',
                'short_description' => 'Inventory, pathology, and other management systems to digitize and streamline business operations.',
                'description' => 'I build management systems that centralize records, automate reports, and give teams dashboards and workflows that replace spreadsheets and paperwork.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'REST API Development',
                'slug' => 'rest-api-development',
                'icon' => 'bi-plug',
                'short_description' => 'Well-structured REST APIs built with Laravel for web and mobile applications.',
                'description' => 'I design and implement REST APIs with token-based authentication, validation, consistent JSON responses, and thorough documentation for teams and clients.',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Database Design & Optimization',
                'slug' => 'database-design-optimization',
                'icon' => 'bi-database',
                'short_description' => 'Clear MySQL schemas, proper indexing, and optimized queries for reliable, fast applications.',
                'description' => 'I plan MySQL schemas with sensible relationships, constraints, and indexes, and tune queries and schema design as applications grow.',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::query()->updateOrCreate(
                ['slug' => $service['slug']],
                $service,
            );
        }
    }
}
