<?php

use Illuminate\Support\Facades\Route;

// ---------------------------------------------------------------------------
// Public (Frontend) Routes
// ---------------------------------------------------------------------------

Route::group(['namespace' => 'App\Http\Controllers\Frontend', 'as' => 'frontend.'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/about', 'AboutController@index')->name('about');

    Route::get('/projects', 'ProjectController@index')->name('projects.index');
    Route::get('/projects/{project:slug}', 'ProjectController@show')->name('projects.show');

    Route::get('/experience', 'ExperienceController@index')->name('experience');

    Route::get('/services', 'ServiceController@index')->name('services');

    Route::get('/blog', 'BlogController@index')->name('blog.index');
    Route::get('/blog/{blog:slug}', 'BlogController@show')->name('blog.show');

    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::post('/contact', 'ContactController@store')->name('contact.store');
});

// ---------------------------------------------------------------------------
// Admin Routes
// ---------------------------------------------------------------------------

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'as' => 'admin.', 'prefix' => 'admin'], function () {
    // Public authentication routes. The "guest" middleware redirects users who
    // are already signed in away from the login screen.
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', 'AuthController@showLogin')->name('login');
        Route::post('/login', 'AuthController@login')->name('login.submit');
    });

    // Logout is intentionally a POST request so it can never be triggered by a
    // simple link, image, or cross-site request.
    Route::post('/logout', 'AuthController@logout')->name('logout');

    // Protected admin area.
    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('/dashboard', 'DashboardController@index');
    });
});
