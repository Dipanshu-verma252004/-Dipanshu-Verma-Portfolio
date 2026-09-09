<aside class="admin-sidebar" id="adminSidebar" aria-label="Admin navigation">
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
        <span class="brand-icon"><i class="bi bi-person-gear" aria-hidden="true"></i></span>
        <span>Dipanshu Panel</span>
    </a>

    <ul class="nav flex-column">
        @php
            $sections = [
                [
                    'label' => 'Overview',
                    'items' => [
                        ['label' => 'Dashboard', 'icon' => 'bi-speedometer2', 'route' => 'admin.dashboard'],
                    ],
                ],
                [
                    'label' => 'Portfolio',
                    'items' => [
                        ['label' => 'About', 'icon' => 'bi-person-bounding-box', 'route' => null],
                        ['label' => 'Projects', 'icon' => 'bi-briefcase', 'route' => null],
                        ['label' => 'Skills', 'icon' => 'bi-lightning-charge', 'route' => null],
                        ['label' => 'Experience', 'icon' => 'bi-clock-history', 'route' => null],
                        ['label' => 'Services', 'icon' => 'bi-tools', 'route' => null],
                        ['label' => 'Testimonials', 'icon' => 'bi-chat-quote', 'route' => null],
                    ],
                ],
                [
                    'label' => 'Content',
                    'items' => [
                        ['label' => 'Blog', 'icon' => 'bi-journal-richtext', 'route' => null],
                        ['label' => 'Blog Categories', 'icon' => 'bi-collection', 'route' => null],
                    ],
                ],
                [
                    'label' => 'Communication',
                    'items' => [
                        ['label' => 'Contact Messages', 'icon' => 'bi-envelope-paper', 'route' => null],
                    ],
                ],
                [
                    'label' => 'Settings',
                    'items' => [
                        ['label' => 'Site Settings', 'icon' => 'bi-sliders', 'route' => null],
                        ['label' => 'Social Links', 'icon' => 'bi-share', 'route' => null],
                    ],
                ],
            ];
        @endphp

        @foreach ($sections as $section)
            <li class="nav-section">{{ $section['label'] }}</li>

            @foreach ($section['items'] as $item)
                @if ($item['route'] !== null && Route::has($item['route']))
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}"
                            href="{{ route($item['route']) }}">
                            <i class="bi {{ $item['icon'] }}" aria-hidden="true"></i>
                            <span>{{ $item['label'] }}</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <span class="nav-link disabled" aria-disabled="true" tabindex="-1">
                            <i class="bi {{ $item['icon'] }}" aria-hidden="true"></i>
                            <span>{{ $item['label'] }}</span>
                        </span>
                    </li>
                @endif
            @endforeach
        @endforeach
    </ul>

    <div class="sidebar-footer">
        <hr class="border-secondary-subtle">

        <form method="post" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="nav-link w-100 text-start" style="color: #f87171;">
                <i class="bi bi-box-arrow-left" aria-hidden="true"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>