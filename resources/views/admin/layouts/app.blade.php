<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Dashboard') · Admin · {{ config('app.name', 'Dipanshu Portfolio') }}</title>

        <!-- Bootstrap 5 (CDN - no build step required) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

        <style>
            :root {
                --admin-bg: #f4f6fb;
                --admin-sidebar-bg: #0f172a;
                --admin-sidebar-active: #6366f1;
                --admin-sidebar-text: #cbd5e1;
                --admin-sidebar-text-active: #ffffff;
                --admin-card-border: #e2e8f0;
            }

            body {
                background-color: var(--admin-bg);
            }

            /* ------------------------------------------------------------------
               Sidebar (desktop) / off-canvas (mobile)
               ------------------------------------------------------------------ */
            .admin-sidebar {
                position: fixed;
                top: 0;
                left: 0;
                bottom: 0;
                width: 260px;
                background-color: var(--admin-sidebar-bg);
                display: flex;
                flex-direction: column;
                z-index: 1045;
                transform: translateX(-100%);
                transition: transform .2s ease-in-out;
                overflow-y: auto;
            }

            .admin-sidebar.open {
                transform: translateX(0);
            }

            .admin-sidebar .sidebar-brand {
                display: flex;
                align-items: center;
                gap: .5rem;
                padding: 1rem 1.25rem;
                color: #fff;
                font-weight: 600;
                text-decoration: none;
            }

            .admin-sidebar .sidebar-brand .brand-icon {
                width: 36px;
                height: 36px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                background-color: var(--admin-sidebar-active);
                color: #fff;
                border-radius: .5rem;
            }

            .admin-sidebar .nav-section {
                padding: .5rem 1.25rem;
                font-size: .75rem;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: .04em;
                color: #94a3b8;
            }

            .admin-sidebar .nav-link {
                color: var(--admin-sidebar-text);
                display: flex;
                align-items: center;
                gap: .6rem;
                padding: .55rem .75rem;
                border-radius: .5rem;
                margin: 0 .35rem;
                font-size: .9rem;
                text-decoration: none;
            }

            .admin-sidebar .nav-link:hover {
                color: #fff;
                background-color: rgba(255, 255, 255, .08);
            }

            .admin-sidebar .nav-link.active {
                color: var(--admin-sidebar-text-active);
                background-color: var(--admin-sidebar-active);
            }

            .admin-sidebar .nav-link.disabled {
                color: #64748b;
                pointer-events: none;
                opacity: .8;
            }

            .admin-sidebar .sidebar-footer {
                padding: 1rem 1.25rem;
            }

            /* ------------------------------------------------------------------
               Wrapper / main
               ------------------------------------------------------------------ */
            .admin-wrapper {
                margin-left: 260px;
            }

            .admin-topbar {
                background-color: #ffffff;
                border-bottom: 1px solid var(--admin-card-border);
                padding: .75rem 1rem;
                position: sticky;
                top: 0;
                z-index: 1030;
            }

            .admin-content {
                padding: 1.5rem;
            }

            /* ------------------------------------------------------------------
               Off-canvas backdrop (mobile only)
               ------------------------------------------------------------------ */
            .sidebar-backdrop {
                position: fixed;
                inset: 0;
                background-color: rgba(15, 23, 42, .45);
                z-index: 1040;
                display: none;
            }

            .sidebar-backdrop.show {
                display: block;
            }

            /* ------------------------------------------------------------------
               Cards / utility tweaks
               ------------------------------------------------------------------ */
            .stat-card .stat-icon {
                width: 48px;
                height: 48px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 1.25rem;
                border-radius: .75rem;
            }

            @media (max-width: 991.98px) {
                .admin-sidebar {
                    transform: translateX(-100%);
                }

                .admin-wrapper {
                    margin-left: 0;
                }
            }
        </style>
<script>
            // Vanilla JS sidebar toggle for small/medium screens.
            document.addEventListener('DOMContentLoaded', function () {
                const sidebar = document.querySelector('.admin-sidebar');
                const backdrop = document.querySelector('.sidebar-backdrop');
                const toggler = document.querySelectorAll('[data-admin-sidebar-toggle]');
                const close = document.querySelectorAll('[data-admin-sidebar-close]');

                function openSidebar() {
                    if (sidebar) sidebar.classList.add('open');
                    if (backdrop) backdrop.classList.add('show');
                }

                function closeSidebar() {
                    if (sidebar) sidebar.classList.remove('open');
                    if (backdrop) backdrop.classList.remove('show');
                }

                toggler.forEach(el => el.addEventListener('click', openSidebar));
                close.forEach(el => el.addEventListener('click', closeSidebar));
                if (backdrop) backdrop.addEventListener('click', closeSidebar);
            });
        </script>
    </head>
    <body>
        @include('admin.partials.sidebar')

        <div class="sidebar-backdrop" data-admin-sidebar-close></div>

        <div class="admin-wrapper">
            @include('admin.partials.topbar')

            <main class="admin-content">
                @include('admin.partials.flash-messages')

                @yield('content')
            </main>
        </div>

        <!-- Bootstrap 5 JS bundle (CDN) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>