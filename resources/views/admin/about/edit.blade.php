@extends('admin.layouts.app')

@section('title', 'About Profile')
@section('breadcrumb', 'About Profile')

@section('content')
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div>
        <h1 class="h3 mb-1">About Profile</h1>
        <p class="text-muted mb-0">Manage the profile information displayed on your public portfolio.</p>
    </div>
</div>

<form method="POST" action="{{ route('admin.about.update') }}">
    @csrf
    @method('PUT')

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header fw-semibold">Profile Information</div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Name <span class="text-danger">*</span></label>
                            <input name="name" class="form-control" value="{{ old('name', $about->name) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Designation <span class="text-danger">*</span></label>
                            <input name="designation" class="form-control" value="{{ old('designation', $about->designation) }}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Short Description</label>
                            <textarea name="short_description" class="form-control" rows="3">{{ old('short_description', $about->short_description) }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Full Description</label>
                            <textarea name="description" class="form-control" rows="7">{{ old('description', $about->description) }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Profile Image Path / URL</label>
                            <input name="profile_image" class="form-control" value="{{ old('profile_image', $about->profile_image) }}" placeholder="images/profile.jpg">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Resume File Path / URL</label>
                            <input name="resume_file" class="form-control" value="{{ old('resume_file', $about->resume_file) }}" placeholder="resumes/dipanshu-verma.pdf">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header fw-semibold">Contact Details</div>
                <div class="card-body">
                    <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="{{ old('email', $about->email) }}"></div>
                    <div class="mb-3"><label class="form-label">Phone</label><input name="phone" class="form-control" value="{{ old('phone', $about->phone) }}"></div>
                    <div><label class="form-label">Location</label><input name="location" class="form-control" value="{{ old('location', $about->location) }}"></div>
                </div>
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-header fw-semibold">Portfolio Stats</div>
                <div class="card-body">
                    <div class="mb-3"><label class="form-label">Years Experience</label><input type="number" min="0" name="years_experience" class="form-control" value="{{ old('years_experience', $about->years_experience) }}"></div>
                    <div class="mb-3"><label class="form-label">Projects Count</label><input type="number" min="0" name="projects_count" class="form-control" value="{{ old('projects_count', $about->projects_count) }}"></div>
                    <div><label class="form-label">Clients Count</label><input type="number" min="0" name="clients_count" class="form-control" value="{{ old('clients_count', $about->clients_count) }}"></div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $about->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Show profile on website</label>
                    </div>
                    <button class="btn btn-primary w-100"><i class="bi bi-check2-circle me-2"></i>Save Profile</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
