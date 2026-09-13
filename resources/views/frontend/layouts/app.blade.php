<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dipanshu Verma — PHP & Laravel Developer portfolio, projects, experience and services.">
    <meta name="theme-color" content="#08111f">
    <title>@yield('title', 'Dipanshu Verma | PHP & Laravel Developer')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/portfolio.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
<header class="site-nav">
    <div class="container nav-wrap">
        <a class="brand" href="{{ route('frontend.home') }}">Dipanshu<span>.</span></a>
        <button class="nav-toggle" type="button" data-nav-toggle aria-label="Toggle navigation" aria-expanded="false">☰</button>
        <nav class="nav-links" data-nav-links>
            <a href="{{ route('frontend.home') }}" class="{{ request()->routeIs('frontend.home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('frontend.about') }}" class="{{ request()->routeIs('frontend.about') ? 'active' : '' }}">About</a>
            <a href="{{ route('frontend.projects.index') }}" class="{{ request()->routeIs('frontend.projects.*') ? 'active' : '' }}">Projects</a>
            <a href="{{ route('frontend.experience') }}" class="{{ request()->routeIs('frontend.experience') ? 'active' : '' }}">Experience</a>
            <a href="{{ route('frontend.services') }}" class="{{ request()->routeIs('frontend.services') ? 'active' : '' }}">Services</a>
            <a href="{{ route('frontend.blog.index') }}" class="{{ request()->routeIs('frontend.blog.*') ? 'active' : '' }}">Blog</a>
            <a href="{{ route('frontend.contact') }}" class="btn-ghost py-2 px-3">Contact</a>
        </nav>
    </div>
</header>
<main>@yield('content')</main>
<footer class="site-footer">
    <div class="container d-md-flex align-items-center justify-content-between">
        <div>© {{ date('Y') }} Dipanshu Verma. Built with Laravel.</div>
        <div class="footer-links">
            <a href="https://github.com/Dipanshu-verma252004" target="_blank" rel="noopener">GitHub</a>
            <a href="https://www.linkedin.com/in/dipanshu-verma-6bb26434b/" target="_blank" rel="noopener">LinkedIn</a>
        </div>
    </div>
</footer>
<script src="{{ asset('js/portfolio.js') }}"></script>
@stack('scripts')
</body>
</html>