@extends('admin.layouts.guest')

@section('title', 'Login')

@section('content')
    <div class="card auth-card shadow-sm">
        <div class="card-body p-4 p-md-5">
            <div class="text-center mb-4">
                <div class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-3"
                    style="width: 56px; height: 56px; font-size: 1.5rem;">
                    <i class="bi bi-person-gear" aria-hidden="true"></i>
                </div>
                <h1 class="h4 mt-3 mb-1 fw-semibold">Dipanshu Portfolio</h1>
                <p class="text-muted mb-0">Admin Panel</p>
            </div>

            <form method="post" action="{{ route('admin.login.submit') }}" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="admin@example.com"
                        required
                        autofocus
                        autocomplete="email">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        id="password"
                        name="password"
                        required
                        autocomplete="current-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember" value="1">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">
                    <i class="bi bi-box-arrow-in-right me-2" aria-hidden="true"></i>Sign in
                </button>
            </form>

            <hr class="my-4">

            <p class="text-center text-muted small mb-0">
                <a href="{{ route('frontend.home') }}" class="text-decoration-none">
                    <i class="bi bi-arrow-left me-1" aria-hidden="true"></i>Back to portfolio
                </a>
            </p>
        </div>
    </div>
@endsection