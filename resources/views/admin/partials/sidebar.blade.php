<aside class="admin-sidebar" id="adminSidebar" aria-label="Admin navigation">
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand"><span class="brand-icon"><i class="bi bi-person-gear"></i></span><span>Dipanshu Panel</span></a>
    <ul class="nav flex-column">
        <li class="nav-section">Overview</li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i><span>Dashboard</span></a></li>
        <li class="nav-section">Portfolio</li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}"><i class="bi bi-briefcase"></i><span>Projects</span></a></li>
        <li class="nav-item"><span class="nav-link disabled"><i class="bi bi-person-bounding-box"></i><span>About</span></span></li>
        <li class="nav-item"><span class="nav-link disabled"><i class="bi bi-lightning-charge"></i><span>Skills</span></span></li>
        <li class="nav-item"><span class="nav-link disabled"><i class="bi bi-clock-history"></i><span>Experience</span></span></li>
        <li class="nav-item"><span class="nav-link disabled"><i class="bi bi-tools"></i><span>Services</span></span></li>
        <li class="nav-section">Content</li>
        <li class="nav-item"><span class="nav-link disabled"><i class="bi bi-journal-richtext"></i><span>Blog</span></span></li>
        <li class="nav-section">Communication</li>
        <li class="nav-item"><span class="nav-link disabled"><i class="bi bi-envelope-paper"></i><span>Contact Messages</span></span></li>
    </ul>
    <div class="sidebar-footer"><hr class="border-secondary-subtle"><form method="post" action="{{ route('admin.logout') }}">@csrf<button type="submit" class="nav-link w-100 text-start" style="color:#f87171"><i class="bi bi-box-arrow-left"></i><span>Logout</span></button></form></div>
</aside>