<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ServiceController;
use App\Http\Controllers\Web\ProjectController;
use App\Http\Controllers\Web\PageController;
use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\NewsletterController;
use App\Http\Controllers\Web\ContactController;

Route::get('/', [HomeController::class , 'index'] )->name('home');

Route::get('page/{slug}', [PageController::class , 'index'] )->name('page.show');

Route::get('services', [ServiceController::class , 'index'])->name('services.index');
Route::get('service/{id}', [ServiceController::class , 'show'])->name('services.show');

Route::get('projects', [ProjectController::class , 'index'])->name('projects.index');
Route::get('project/{id}', [ProjectController::class , 'show'])->name('projects.show');

Route::get('about', [AboutController::class , 'index'] )->name('about');

Route::post('saveNewsletter', [NewsletterController::class , 'save'] )->name('saveNewsletter');

Route::get('contact', [ContactController::class , 'index'] )->name('contact.index');
Route::post('contact', [ContactController::class , 'save'] )->name('contact.save');

Route::get('save-lang/{lang}', [\App\Http\Controllers\LangController::class, 'index'])->name('lang.change');
