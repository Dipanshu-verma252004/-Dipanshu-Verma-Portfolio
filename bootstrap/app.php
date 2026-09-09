<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Register the "admin" middleware alias so routes can use:
        //   Route::group(['middleware' => ['auth', 'admin']], ...)
        $middleware->alias([
            'admin' => AdminMiddleware::class,
        ]);

        // Guests hitting an "auth"-protected route go to the admin login screen.
        $middleware->redirectGuestsTo(fn () => route('admin.login'));

        // Already-authenticated users hitting "guest"-protected routes go to the dashboard.
        $middleware->redirectUsersTo(fn () => route('admin.dashboard'));
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
