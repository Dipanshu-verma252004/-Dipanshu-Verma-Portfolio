@extends('admin.layouts.app')
@section('title','Services')
@section('breadcrumb','Services')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4"><div><h1 class="h3 mb-1">Services</h1><p class="text-muted mb-0">Manage services shown on your portfolio.</p></div><a href="{{ route('admin.services.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-2"></i>Add Service</a></div>
<div class="card shadow-sm"><div class="table-responsive"><table class="table table-hover align-middle mb-0"><thead><tr><th>Service</th><th>Slug</th><th>Order</th><th>Status</th><th class="text-end">Actions</th></tr></thead><tbody>
@forelse($services as $service)<tr><td><div class="fw-semibold">{{ $service->title }}</div><small class="text-muted">{{ Str::limit($service->short_description,70) }}</small></td><td>{{ $service->slug }}</td><td>{{ $service->sort_order }}</td><td><span class="badge {{ $service->is_active ? 'text-bg-success' : 'text-bg-secondary' }}">{{ $service->is_active ? 'Active' : 'Inactive' }}</span></td><td class="text-end"><a href="{{ route('admin.services.edit',$service) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a><form action="{{ route('admin.services.destroy',$service) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this service?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></form></td></tr>
@empty<tr><td colspan="5" class="text-center py-5 text-muted">No services found.</td></tr>@endforelse</tbody></table></div><div class="card-footer">{{ $services->links() }}</div></div>
@endsection
