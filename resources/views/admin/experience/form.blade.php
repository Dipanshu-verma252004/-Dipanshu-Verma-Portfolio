@extends('admin.layouts.app')
@section('title', $experience->exists ? 'Edit Experience' : 'Add Experience')
@section('breadcrumb', $experience->exists ? 'Edit Experience' : 'Add Experience')
@section('content')
<div class="mb-4"><h1 class="h3 mb-1">{{ $experience->exists ? 'Edit Experience' : 'Add Experience' }}</h1><p class="text-muted mb-0">Use verified work history only.</p></div>
<form method="POST" action="{{ $experience->exists ? route('admin.experience.update',$experience) : route('admin.experience.store') }}">@csrf @if($experience->exists) @method('PUT') @endif
<div class="card shadow-sm"><div class="card-body"><div class="row g-3">
<div class="col-md-6"><label class="form-label">Company *</label><input name="company_name" class="form-control" value="{{ old('company_name',$experience->company_name) }}" required></div>
<div class="col-md-6"><label class="form-label">Designation *</label><input name="designation" class="form-control" value="{{ old('designation',$experience->designation) }}" required></div>
<div class="col-md-6"><label class="form-label">Location</label><input name="location" class="form-control" value="{{ old('location',$experience->location) }}"></div>
<div class="col-md-6"><label class="form-label">Employment Type</label><input name="employment_type" class="form-control" value="{{ old('employment_type',$experience->employment_type) }}" placeholder="Full-time / Internship"></div>
<div class="col-md-6"><label class="form-label">Start Date *</label><input type="date" name="start_date" class="form-control" value="{{ old('start_date',$experience->start_date?->format('Y-m-d')) }}" required></div>
<div class="col-md-6"><label class="form-label">End Date</label><input type="date" name="end_date" class="form-control" value="{{ old('end_date',$experience->end_date?->format('Y-m-d')) }}"></div>
<div class="col-12"><label class="form-label">Description</label><textarea name="description" class="form-control" rows="7">{{ old('description',$experience->description) }}</textarea></div>
<div class="col-12"><label class="form-label">Technologies</label><textarea name="technologies" class="form-control" rows="2" placeholder="Laravel, PHP, MySQL, JavaScript">{{ old('technologies',implode(', ',(array)$experience->technologies)) }}</textarea><div class="form-text">Separate technologies with commas.</div></div>
<div class="col-md-4"><label class="form-label">Sort Order</label><input type="number" min="0" name="sort_order" class="form-control" value="{{ old('sort_order',$experience->sort_order ?? 0) }}"></div>
<div class="col-md-4 d-flex align-items-end"><div class="form-check form-switch mb-2"><input class="form-check-input" type="checkbox" name="is_current" value="1" id="is_current" {{ old('is_current',$experience->is_current) ? 'checked' : '' }}><label class="form-check-label" for="is_current">Current role</label></div></div>
<div class="col-md-4 d-flex align-items-end"><div class="form-check form-switch mb-2"><input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active',$experience->is_active ?? true) ? 'checked' : '' }}><label class="form-check-label" for="is_active">Visible</label></div></div>
</div></div><div class="card-footer d-flex justify-content-between"><a href="{{ route('admin.experience.index') }}" class="btn btn-outline-secondary">Cancel</a><button class="btn btn-primary"><i class="bi bi-check2-circle me-2"></i>Save Experience</button></div></div></form>
@endsection
