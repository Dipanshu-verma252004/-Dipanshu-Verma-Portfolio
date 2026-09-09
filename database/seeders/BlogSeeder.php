<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laravel = BlogCategory::query()->where('slug', 'laravel')->first();
        $php = BlogCategory::query()->where('slug', 'php')->first();
        $mysql = BlogCategory::query()->where('slug', 'mysql')->first();
        $frontend = BlogCategory::query()->where('slug', 'frontend')->first();

        $blogs = [
            [
                'blog_category_id' => $laravel?->id,
                'title' => 'Why Laravel is a Great Choice for Your Next Web Application',
                'slug' => 'why-laravel-is-a-great-choice-for-your-next-web-application',
                'excerpt' => 'A quick look at the Laravel features I use most and why they make backend development faster and more maintainable.',
                'content' => "Laravel gives developers a productive and expressive toolkit for building modern PHP web applications. In this post I share the features I rely on every day: the query builder and Eloquent ORM, migrations, validation, and a clean routing layer.\n\nEloquent makes database interactions readable, migrations keep schema changes versioned, and Blade keeps views close to plain HTML. Together they let a small team ship features quickly without sacrificing code quality.\n\nWhether you are building a management system or an API, Laravel's conventions reduce the number of decisions you need to make and keep projects consistent and easy to maintain.",
                'featured_image' => 'images/blog/laravel.webp',
                'author' => 'Dipanshu Verma',
                'published_at' => '2025-06-10 09:00:00',
                'is_published' => true,
                'meta_title' => 'Why Laravel is a Great Choice for Your Next Web Application',
                'meta_description' => 'Learn why Laravel is a great choice for web development, covering Eloquent, migrations, Blade, and maintainable PHP code.',
                'meta_keywords' => 'laravel, php, web development, eloquent, blade',
            ],
            [
                'blog_category_id' => $mysql?->id,
                'title' => 'Designing MySQL Schemas for Maintainable Applications',
                'slug' => 'designing-mysql-schemas-for-maintainable-applications',
                'excerpt' => 'Practical tips for planning MySQL tables, relationships, indexes, and constraints so your database stays easy to work with.',
                'content' => "A good database schema is the foundation of a maintainable application. I start by identifying the entities and their relationships, then model each with the right column types, foreign keys, and constraints.\n\nAdding indexes on foreign keys and frequently queried columns keeps lookups fast, while enforcing uniqueness at the database level protects data integrity even if application code changes.\n\nTaking time at the start to design the schema pays off later by making queries simpler and migrations far less painful.",
                'featured_image' => 'images/blog/mysql.webp',
                'author' => 'Dipanshu Verma',
                'published_at' => '2025-05-22 10:30:00',
                'is_published' => true,
                'meta_title' => 'Designing MySQL Schemas for Maintainable Applications',
                'meta_description' => 'Practical MySQL schema design tips covering relationships, indexes, constraints, and long-term maintainability.',
                'meta_keywords' => 'mysql, database design, schema, indexing',
            ],
        ];

        $blogs[] = [
            'blog_category_id' => $frontend?->id,
            'title' => 'Building Responsive UIs with Bootstrap 5 and Blade',
            'slug' => 'building-responsive-uis-with-bootstrap-5-and-blade',
            'excerpt' => 'How I combine Bootstrap 5 and Laravel Blade to build consistent, responsive interfaces without heavy frontend tooling.',
            'content' => "Not every project needs a JavaScript framework. For most of my work, Bootstrap 5 plus Blade layouts deliver fast, responsive, and consistent interfaces with very little tooling.\n\nBlade layouts and partials keep the markup DRY, while Bootstrap's grid and utilities handle responsiveness. I use vanilla JavaScript and AJAX for the interactions that genuinely need them, keeping pages light and fast.\n\nThis combination is especially effective for admin panels and content-driven sites where server-side rendering is the right fit.",
            'featured_image' => 'images/blog/bootstrap.webp',
            'author' => 'Dipanshu Verma',
            'published_at' => '2025-04-18 08:45:00',
            'is_published' => true,
            'meta_title' => 'Building Responsive UIs with Bootstrap 5 and Blade',
            'meta_description' => 'A practical look at building responsive Laravel interfaces using Bootstrap 5, Blade layouts, and vanilla JavaScript.',
            'meta_keywords' => 'bootstrap 5, blade, laravel, responsive, frontend',
        ];

        $blogs[] = [
            'blog_category_id' => $php?->id,
            'title' => 'Getting Started with AJAX in Laravel',
            'slug' => 'getting-started-with-ajax-in-laravel',
            'excerpt' => 'A beginner-friendly introduction to adding AJAX to Laravel apps without introducing a frontend framework.',
            'content' => "AJAX lets you update parts of a page without a full reload, which makes interfaces feel much snappier. With Laravel, a typical flow is a small route that returns JSON and a little vanilla JavaScript that updates the page.\n\nStart with a simple endpoint that returns JSON, wire up a fetch call from the frontend, and handle success and error responses cleanly. Add CSRF handling for POST requests and keep the JavaScript organized with small, focused functions.\n\nThis approach keeps the frontend simple while giving you most of the interactivity users expect.",
            'featured_image' => 'images/blog/ajax.webp',
            'author' => 'Dipanshu Verma',
            'published_at' => '2025-03-05 14:00:00',
            'is_published' => true,
            'meta_title' => 'Getting Started with AJAX in Laravel',
            'meta_description' => 'A beginner-friendly guide to adding AJAX to Laravel applications with vanilla JavaScript and JSON endpoints.',
            'meta_keywords' => 'ajax, laravel, javascript, json, fetch',
        ];

        $this->seedBlogs($blogs);
    }

    /**
     * Persist the given blog seeds.
     */
    protected function seedBlogs(array $blogs): void
    {
        foreach ($blogs as $blog) {
            if ($blog['blog_category_id'] === null) {
                continue;
            }

            Blog::query()->updateOrCreate(
                ['slug' => $blog['slug']],
                $blog,
            );
        }
    }
}
