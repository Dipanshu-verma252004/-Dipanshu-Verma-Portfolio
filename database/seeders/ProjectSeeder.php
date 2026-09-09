<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Inventory Management System',
                'slug' => 'inventory-management-system',
                'short_description' => 'A Laravel-based inventory system to track products, stock levels, suppliers, and purchase orders.',
                'description' => "A complete inventory management system built with Laravel and MySQL. It provides role-based access for admins and staff, product and category management, real-time stock tracking, supplier and purchase order handling, and low-stock alerts.\n\nFeatures include stock in/out adjustments with audit history, purchase order workflows, dashboard analytics, and CSV export of inventory reports.",
                'project_type' => 'Web Application',
                'client_name' => null,
                'role' => 'Full Stack Developer',
                'start_date' => '2025-01-10',
                'end_date' => null,
                'live_url' => null,
                'github_url' => 'https://github.com/dipanshuverma/inventory-management-system',
                'featured_image' => 'images/projects/inventory-management-system.webp',
                'technologies' => ['Laravel', 'MySQL', 'Bootstrap 5', 'AJAX', 'jQuery'],
                'challenges' => 'Designing reliable stock adjustment logic and preventing race conditions during concurrent stock updates.',
                'solution' => 'Used MySQL transactions and row locking to keep stock counts accurate, added server-side validation, and built an audit trail for every stock change.',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Pathology Management System',
                'slug' => 'pathology-management-system',
                'short_description' => 'A Laravel application for managing pathology lab tests, patients, reports, and billing.',
                'description' => "A pathology lab management system that centralizes patient registration, test catalog, report generation, and billing in one place.\n\nIt includes test parameter configuration, automated report templates, payment tracking, and role-based dashboards for receptionists, lab technicians, and administrators.",
                'project_type' => 'Web Application',
                'client_name' => 'Pathology Lab Client',
                'role' => 'Backend Developer',
                'start_date' => '2025-05-15',
                'end_date' => null,
                'live_url' => null,
                'github_url' => 'https://github.com/dipanshuverma/pathology-management-system',
                'featured_image' => 'images/projects/pathology-management-system.webp',
                'technologies' => ['Laravel', 'MySQL', 'Bootstrap 5', 'AJAX', 'jQuery'],
                'challenges' => 'Structuring dynamic diagnostic reports with variable test parameters and units for each lab test.',
                'solution' => 'Built a flexible test-parameter model that composes reports dynamically, keeping the report engine reusable across different test types.',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'NGO Website',
                'slug' => 'ngo-website',
                'short_description' => 'A dynamic website for a non-profit with programs, campaigns, events, and online donations.',
                'description' => "A complete NGO website with a public-facing site and a simple admin panel. The public side showcases the mission, programs, campaigns, upcoming events, success stories, and a donation flow.\n\nThe admin area lets the NGO team manage programs, events, gallery images, and contact enquiries without touching code.",
                'project_type' => 'Website',
                'client_name' => 'NGO Client',
                'role' => 'Full Stack Developer',
                'start_date' => '2024-10-01',
                'end_date' => '2025-02-28',
                'live_url' => null,
                'github_url' => 'https://github.com/dipanshuverma/ngo-website',
                'featured_image' => 'images/projects/ngo-website.webp',
                'technologies' => ['PHP', 'CodeIgniter', 'MySQL', 'Bootstrap 5', 'jQuery', 'AJAX'],
                'challenges' => 'Keeping the site easy to update for a non-technical NGO team while staying fast on shared hosting.',
                'solution' => 'Delivered a clean admin panel for content management, used server-side rendering for fast page loads, and optimized database queries for the hosting environment.',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Online Examination System',
                'slug' => 'online-examination-system',
                'short_description' => 'An online exam platform with question banks, timed tests, auto-grading, and result reports.',
                'description' => "An online examination system where admins create exams from a question bank and candidates take timed tests with instant auto-grading.\n\nIt includes support for multiple-choice questions, randomized question order, timer handling, result breakdowns, and exportable performance reports.",
                'project_type' => 'Web Application',
                'client_name' => null,
                'role' => 'Full Stack Developer',
                'start_date' => '2024-06-01',
                'end_date' => '2024-09-30',
                'live_url' => null,
                'github_url' => 'https://github.com/dipanshuverma/online-examination-system',
                'featured_image' => 'images/projects/online-examination-system.webp',
                'technologies' => ['Laravel', 'MySQL', 'Bootstrap 5', 'AJAX', 'jQuery'],
                'challenges' => 'Preserving a fair test with randomized questions and preventing answers from being lost on refresh or time-out.',
                'solution' => 'Persisted answers progressively via AJAX, tracked time server-side, and locked exams once submitted to guarantee accurate results.',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Online Voting System',
                'slug' => 'online-voting-system',
                'short_description' => 'A secure online voting platform for elections with candidates, ballots, and results.',
                'description' => "An online voting system for running elections digitally. Users authenticate to vote once, view candidate profiles, and see live results after the election closes.\n\nThe system enforces one-vote-per-user, uses ballot status tracking, and provides an admin area for managing elections, candidates, and results.",
                'project_type' => 'Web Application',
                'client_name' => null,
                'role' => 'Full Stack Developer',
                'start_date' => '2024-02-01',
                'end_date' => '2024-05-31',
                'live_url' => null,
                'github_url' => 'https://github.com/dipanshuverma/online-voting-system',
                'featured_image' => 'images/projects/online-voting-system.webp',
                'technologies' => ['Laravel', 'MySQL', 'Bootstrap 5', 'AJAX', 'jQuery'],
                'challenges' => 'Ensuring a user could not vote twice and keeping results tamper-evident.',
                'solution' => 'Added a unique ballot-per-user constraint in the database, used transactions when recording votes, and made results read-only after the election window.',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($projects as $project) {
            Project::query()->updateOrCreate(
                ['slug' => $project['slug']],
                $project,
            );
        }
    }
}
