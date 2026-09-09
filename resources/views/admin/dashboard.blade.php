@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('breadcrumb', 'Dashboard')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h1 class="h3 mb-1">Welcome back, Dipanshu</h1>
            <p class="text-muted mb-0">
                Manage your portfolio content, projects, experience and messages.
            </p>
        </div>

        <div class="d-flex gap-2">
            @if (Route::has('frontend.home'))
                <a href="{{ route('frontend.home') }}" target="_blank" rel="noopener" class="btn btn-outline-primary">
                    <i class="bi bi-box-arrow-up-right me-2" aria-hidden="true"></i>View Portfolio
                </a>
            @endif
        </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-3 mb-4">
        <div class="col">
            <div class="card stat-card h-100 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    <span class="stat-icon bg-primary-subtle text-primary">
                        <i class="bi bi-briefcase" aria-hidden="true"></i>
                    </span>
                    <div>
                        <div class="fs-4 fw-semibold">{{ $stats['projects'] }}</div>
                        <div class="text-muted small">Projects</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card stat-card h-100 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    <span class="stat-icon bg-success-subtle text-success">
                        <i class="bi bi-lightning-charge" aria-hidden="true"></i>
                    </span>
                    <div>
                        <div class="fs-4 fw-semibold">{{ $stats['skills'] }}</div>
                        <div class="text-muted small">Skills</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card stat-card h-100 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    <span class="stat-icon bg-info-subtle text-info">
                        <i class="bi bi-clock-history" aria-hidden="true"></i>
                    </span>
                    <div>
                        <div class="fs-4 fw-semibold">{{ $stats['experiences'] }}</div>
                        <div class="text-muted small">Experience</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card stat-card h-100 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    <span class="stat-icon bg-warning-subtle text-warning">
                        <i class="bi bi-journal-richtext" aria-hidden="true"></i>
                    </span>
                    <div>
                        <div class="fs-4 fw-semibold">{{ $stats['blogs'] }}</div>
                        <div class="text-muted small">Blog Posts</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card stat-card h-100 shadow-sm">
                <div class="card-body d-flex align-items-center gap-3">
                    <span class="stat-icon bg-secondary-subtle text-secondary">
                        <i class="bi bi-chat-quote" aria-hidden="true"></i>
                    </span>
                    <div>
                        <div class="fs-4 fw-semibold">{{ $stats['testimonials'] }}</div>
                        <div class="text-muted small">Testimonials</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card stat-card h-100 shadow-sm {{ $stats['unread_messages'] > 0 ? 'border-primary' : '' }}">
                <div class="card-body d-flex align-items-center gap-3">
                    <span class="stat-icon bg-danger-subtle text-danger">
                        <i class="bi bi-envelope-open" aria-hidden="true"></i>
                    </span>
                    <div>
                        <div class="fs-4 fw-semibold">{{ $stats['unread_messages'] }}</div>
                        <div class="text-muted small">Unread Messages</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="row g-3">
        <div class="col-lg-7">
            <div class="card shadow-sm h-100">
                <div class="card-header">Recent Projects</div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Project</th>
                                <th scope="col">Type</th>
                                <th scope="col">Featured</th>
                                <th scope="col">Status</th>
                                <th scope="col">Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recent_projects as $project)
                                <tr>
                                    <td>{{ $project->title }}</td>
                                    <td>{{ $project->project_type ?? '—' }}</td>
                                    <td>
                                        @if ($project->is_featured)
                                            <span class="badge text-bg-warning">Featured</span>
                                        @else
                                            <span class="badge text-bg-light">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($project->is_active)
                                            <span class="badge text-bg-success">Active</span>
                                        @else
                                            <span class="badge text-bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $project->updated_at?->format('M j, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card shadow-sm h-100">
                <div class="card-header">Recent Messages</div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recent_messages as $message)
                                @php
                                    $statusBadges = [
                                        'new' => ['label' => 'New', 'class' => 'text-bg-primary'],
                                        'read' => ['label' => 'Read', 'class' => 'text-bg-info'],
                                        'replied' => ['label' => 'Replied', 'class' => 'text-bg-success'],
                                        'archived' => ['label' => 'Archived', 'class' => 'text-bg-secondary'],
                                    ];
                                    $badge = $statusBadges[$message->status] ?? ['label' => $message->status, 'class' => 'text-bg-secondary'];
                                @endphp
                                <tr>
                                    <td>{{ $message->name }}</td>
                                    <td class="text-truncate">{{ $message->email }}</td>
                                    <td class="text-truncate">{{ $message->subject ?? '—' }}</td>
                                    <td><span class="badge {{ $badge['class'] }}">{{ $badge['label'] }}</span></td>
                                    <td>{{ $message->created_at?->format('M j, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection