@extends('admin.layouts.app')
@section('title', $service->exists ? 'Edit Service' : 'Add Service')
@section('breadcrumb', $service->exists ? 'Edit Service' : 'Add Service')
@section('content')
<div class="mb-4"><h1 class="h3 mb-1">{{ $service->exists ? 'Edit Service' : 'Add Service' }}</h1><p class="text-muted mb-0">Keep the service content concise and recruiter-friendly.</p></div>
<form method="POST" action="{{ $service->exists ? route('admin.services.update',$service) : route('admin.services.store') }}">@csrf @if($service->exists) @method('PUT') @endif
<div class="card shadow-sm"><div class="card-body"><div class="row g-3">
<div class="col-md-8"><label class="form-label">Title *</label><input name="title" class="form-control" value="{{ old('title',$service->title) }}" required></div>
<div class="col-md-4"><label class="form-label">Icon</label><input name="icon" class="form-control" value="{{ old('icon',$service->icon) }}" placeholder="bi-code-slash"></div>
<div class="col-12"><label class="form-label">Short Description</label><textarea name="short_description" class="form-control" rows="3">{{ old('short_description',$service->short_description) }}</textarea></div>
<div class="col-12"><label class="form-label">Description</label><textarea name="description" class="form-control" rows="6">{{ old('description',$service->description) }}</textarea></div>
<div class="col-md-3"><label class="form-label">Sort Order</label><input type="number" min="0" name="sort_order" class="form-control" value="{{ old('sort_order',$service->sort_order ?? 0) }}"></div>
<div class="col-md-9 d-flex align-items-end"><div class="form-check form-switch mb-2"><input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active',$service->is_active ?? true) ? 'checked' : '' }}><label class="form-check-label" for="is_active">Active on public website</label></div></div>
</div></div><div class="card-footer d-flex justify-content-between"><a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">Cancel</a><button class="btn btn-primary"><i class="bi bi-check2-circle me-2"></i>Save Service</button></div></div></form>
@endsection
