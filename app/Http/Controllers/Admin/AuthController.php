<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    /**
     * Authenticate an administrator.
     *
     * Laravel's SessionGuard automatically regenerates the session ID on a
     * successful login, which mitigates session fixation attacks.
     *
     * @param  \App\Http\Requests\AdminLoginRequest  $request
     */
    public function login(AdminLoginRequest $request)
    {
        $credentials = [
            'email' => $request->validated('email'),
            'password' => $request->validated('password'),
        ];

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            session()->flash('error', 'These credentials do not match our records.');

            return redirect()->route('admin.login')->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        $user = Auth::user();

        // Never allow a non-admin user to enter the admin area. Log them right
        // back out and invalidate the session instead of showing a 403.
        if ($user === null || ! $user->isAdmin()) {
            Auth::logout();

            session()->invalidate();
            session()->regenerateToken();

            session()->flash('error', 'You are not authorized to access the admin panel.');

            return redirect()->route('admin.login');
        }

        session()->flash('success', 'Welcome back, '.$user->name.'!');

        return redirect()->route('admin.dashboard');
    }

    /**
     * Log the administrator out and invalidate the session.
     */
    public function logout()
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        session()->flash('success', 'You have been signed out.');

        return redirect()->route('admin.login');
    }
}