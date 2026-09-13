<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', 'AuthController@showLogin')->name('login');
        Route::post('/login', 'AuthController@login')->name('login.submit');
    });

    Route::post('/logout', 'AuthController@logout')->name('logout');

    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::get('/dashboard', 'DashboardController@index');
        Route::resource('/projects', 'ProjectController')->except(['show']);
    });
});
