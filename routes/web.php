<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ProjectController;
use App\Http\Controllers\Web\ServiceController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('about-us', 'web.pages.aboutUs.index')->name('aboutUs');
Route::view('services', 'web.pages.services.index')->name('services');
Route::view('projects', 'web.pages.projects.index')->name('projects');
Route::view('contactUs', 'web.pages.contactUs.index')->name('contactUs');
Route::view('blog', 'web.pages.blog.index')->name('blog');


Route::get('/linkstorage', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
});

Route::get('/cacheClear', function () {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
});

