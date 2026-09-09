<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>403 · Access Denied · {{ config('app.name', 'Dipanshu Portfolio') }}</title>

        <!-- Bootstrap 5 (CDN) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    </head>
    <body class="bg-body-tertiary">
        <main class="d-flex align-items-center justify-content-center min-vh-100 py-5">
            <div class="text-center" style="max-width: 480px;">
                <div class="display-1 fw-bold text-danger">403</div>
                <h1 class="h4 mt-3">Access Denied</h1>
                <p class="text-muted mb-4">
                    You do not have permission to access this area. If you believe this
                    is a mistake, please contact the site administrator.
                </p>
                <a href="{{ route('admin.login') }}" class="btn btn-primary">
                    <i class="bi bi-box-arrow-in-right me-2" aria-hidden="true"></i>Go to Admin Login
                </a>
            </div>
        </main>
    </body>
</html>