@extends('frontend.layouts.app')

@section('title', 'Dipanshu Verma | PHP & Laravel Developer')

@section('content')
<section class="hero">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-8 reveal">
                <span class="eyebrow">PHP · Laravel · MySQL</span>
                <h1>I build clean, scalable <span>web applications.</span></h1>
                <p>I’m Dipanshu Verma, a PHP & Laravel Developer focused on backend development, admin panels, database-driven applications and practical business solutions.</p>
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a class="btn btn-main" href="{{ route('frontend.projects.index') }}">View Projects</a>
                    <a class="btn btn-ghost" href="{{ route('frontend.contact') }}">Let's Work Together</a>
                    <a class="btn btn-ghost" href="https://github.com/Dipanshu-verma252004" target="_blank" rel="noopener">GitHub ↗</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-pro">
                    <div class="stat mb-4"><strong>Laravel 12</strong><span class="muted">Modern PHP development</span></div>
                    <div class="stat mb-4"><strong>MySQL</strong><span class="muted">Relational database design</span></div>
                    <div class="stat"><strong>REST APIs</strong><span class="muted">AJAX & integrations</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="section-title"><div class="kicker">What I do</div><h2>Backend-first development.</h2><p>From database design to responsive admin interfaces, I focus on maintainable Laravel applications that solve real business problems.</p></div>
        <div class="row g-4">
            @foreach(($services ?? collect())->take(3) as $service)
            <div class="col-md-4"><div class="card-pro"><h4>{{ $service->title }}</h4><p class="muted mb-0">{{ $service->short_description ?? $service->description ?? 'Reliable web development service.' }}</p></div></div>
            @endforeach
            @if(($services ?? collect())->isEmpty())
            <div class="col-md-4"><div class="card-pro"><h4>Laravel Development</h4><p class="muted mb-0">CRUD applications, authentication, APIs, validation and clean architecture.</p></div></div>
            <div class="col-md-4"><div class="card-pro"><h4>Admin Panels</h4><p class="muted mb-0">Responsive dashboards and data-management interfaces for business workflows.</p></div></div>
            <div class="col-md-4"><div class="card-pro"><h4>PHP & MySQL</h4><p class="muted mb-0">Database-driven applications with secure forms, queries and integrations.</p></div></div>
            @endif
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-title d-flex justify-content-between align-items-end gap-3"><div><div class="kicker">Selected work</div><h2>Recent projects.</h2></div><a class="btn btn-ghost" href="{{ route('frontend.projects.index') }}">All Projects →</a></div>
        <div class="row g-4">
            @forelse(($projects ?? collect()) as $project)
            <div class="col-md-6 col-lg-4"><a href="{{ route('frontend.projects.show', $project) }}"><div class="card-pro project-card"><div class="project-media">{{ $project->project_type ?? 'Web Application' }}</div><div class="project-body"><div class="muted small mb-2">{{ $project->project_type ?? 'Development' }}</div><h4>{{ $project->title }}</h4><p class="muted">{{ $project->short_description }}</p><span class="text-info fw-semibold">View case study →</span></div></div></a></div>
            @empty
            <div class="col-12"><div class="card-pro"><h4>Projects are being prepared.</h4><p class="muted mb-0">Project entries can be added from the portfolio database/admin workflow.</p></div></div>
            @endforelse
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container text-center">
        <div class="section-title mb-4"><div class="kicker">Available for opportunities</div><h2>Have a Laravel project in mind?</h2><p class="mx-auto">Let's discuss the requirements and build something useful, reliable and easy to maintain.</p></div>
        <a class="btn btn-main" href="{{ route('frontend.contact') }}">Start a Conversation</a>
    </div>
</section>
@endsection