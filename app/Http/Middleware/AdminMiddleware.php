<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Restricts access to the admin area to authenticated users with the
     * "is_admin" flag set. The "auth" middleware normally runs first and is
     * responsible for redirecting guests to the login screen; this middleware
     * remains defensive about authentication anyway.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guest()) {
            return redirect()->route('admin.login');
        }

        $user = Auth::user();

        if ($user === null || ! $user->isAdmin()) {
            abort(403);
        }

        return $next($request);
    }
}