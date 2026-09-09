<header class="admin-topbar">
    <div class="d-flex align-items-center justify-content-between gap-3">
        <div class="d-flex align-items-center gap-3">
            <button type="button"
                class="btn btn-outline-secondary btn-sm d-lg-none"
                data-admin-sidebar-toggle
                aria-label="Toggle navigation">
                <i class="bi bi-list" aria-hidden="true"></i>
            </button>

            <nav aria-label="breadcrumb" class="mb-0">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('frontend.home') }}" class="text-decoration-none">
                            <i class="bi bi-house-door me-1" aria-hidden="true"></i>Portfolio
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        @yield('breadcrumb', 'Admin')
                    </li>
                </ol>
            </nav>
        </div>

        <div class="dropdown">
            <button type="button"
                class="btn btn-outline-secondary btn-sm dropdown-toggle"
                data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="bi bi-person-circle me-1" aria-hidden="true"></i>
                {{ auth()->user()?->name }}
            </button>

            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                <li>
                    <span class="dropdown-item-text text-truncate" style="max-width: 240px;">
                        <small class="text-muted d-block text-truncate">{{ auth()->user()?->email }}</small>
                    </span>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="post" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="bi bi-box-arrow-left me-2" aria-hidden="true"></i>Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>