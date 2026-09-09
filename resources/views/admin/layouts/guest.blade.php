<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', config('app.name', 'Dipanshu Portfolio')) · Admin</title>

        <!-- Bootstrap 5 (CDN - no build step required) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

        <style>
            :root {
                --admin-bg: #f4f6fb;
                --admin-card-border: #e2e8f0;
            }

            body {
                background-color: var(--admin-bg);
                min-height: 100vh;
            }

            .auth-card {
                border: 1px solid var(--admin-card-border);
                border-radius: 1rem;
                box-shadow: 0 .5rem 1rem rgba(15, 23, 42, .08);
            }
        </style>
    </head>
    <body>
        <main class="d-flex align-items-center justify-content-center min-vh-100 py-5">
            <div class="container" style="max-width: 440px;">
                @include('admin.partials.flash-messages')

                @yield('content')
            </div>
        </main>
    </body>
</html>