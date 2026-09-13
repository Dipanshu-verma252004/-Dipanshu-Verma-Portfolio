@extends('frontend.layouts.app')
@section('title', 'About | Dipanshu Verma')
@section('content')
<section class="section"><div class="container">
<div class="section-title"><div class="kicker">About me</div><h1>{{ $about->name ?? 'Dipanshu Verma' }}</h1><p>{{ $about->designation ?? 'PHP & Laravel Developer' }}</p></div>
<div class="row g-4 align-items-stretch">
<div class="col-lg-7"><div class="card-pro h-100"><h3>Building practical web solutions</h3><p class="muted">{{ $about->description ?? 'I am a PHP developer focused on Laravel, MySQL, REST APIs, AJAX and responsive business applications. I enjoy turning requirements into clean, maintainable software.' }}</p><p class="muted mb-0">{{ $about->short_description ?? 'Focused on backend development, database-driven applications and professional admin panels.' }}</p></div></div>
<div class="col-lg-5"><div class="card-pro h-100"><div class="row g-4"><div class="col-6"><div class="stat"><strong>{{ $about->years_experience ?? '—' }}</strong><span class="muted">Years experience</span></div></div><div class="col-6"><div class="stat"><strong>{{ $about->projects_count ?? '—' }}</strong><span class="muted">Projects</span></div></div><div class="col-12"><div class="stat"><strong>{{ $about->location ?? 'Uttar Pradesh, India' }}</strong><span class="muted">Location</span></div></div></div></div></div>
</div>
</div></section>
<section class="section section-soft"><div class="container"><div class="section-title"><div class="kicker">Technical skills</div><h2>Tools I work with.</h2></div><div class="row g-4">@forelse($skillCategories as $category)<div class="col-md-6"><div class="card-pro"><h4>{{ $category->name }}</h4><div class="mt-3">@foreach($category->skills as $skill)<span class="tag">{{ $skill->name }}</span>@endforeach</div></div></div>@empty<div class="col-12"><div class="card-pro"><p class="muted mb-0">Skills will appear here as they are added to the portfolio.</p></div></div>@endforelse</div></div></section>
@endsection