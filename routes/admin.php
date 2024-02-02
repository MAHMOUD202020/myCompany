<?php
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Admin\Auth\LoginController;
use \App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use \App\Http\Controllers\Admin\Auth\ResetPasswordController;
use \App\Http\Controllers\Admin\Auth\ConfirmPasswordController;

use \App\Http\Controllers\Admin\AdminController;
use \App\Http\Controllers\Admin\DashboardController;
use \App\Http\Controllers\Admin\ProfileController;
use \App\Http\Controllers\Admin\CategoryController;
use \App\Http\Controllers\Admin\SliderController;
use \App\Http\Controllers\Admin\ProjectController;
use \App\Http\Controllers\Admin\PartnerController;
use \App\Http\Controllers\Admin\ProductController;

// Login
Route::get('login', [LoginController::class , 'showLoginForm'])->name('login');
Route::post('login',  [LoginController::class , 'login']);

// Register
//Route::get('register', [RegisterController::class,'showRegistrationForm'])->name('register');
//Route::post('register', [RegisterController::class,'register']);
//

// Reset Password
Route::get('password/reset', [ForgotPasswordController::class , 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class , 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class , 'showResetForm'])->name('password.reset');
Route::post('password/reset',  [ResetPasswordController::class , 'reset'])->name('password.update');

// Confirm Password
Route::get('password/confirm', [ConfirmPasswordController::class,'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class,'confirm']);

Route::middleware('admin.auth')->group(function () {

    // logo out
    Route::any('logout', [LoginController::class, 'logout'])->name('logout');

    //////////////// ........ start lang ........ //////////////
    Route::get('save-lang/{lang}', [\App\Http\Controllers\LangController::class, 'index'])->name('lang.change');
    //////////////// ........ end lang ........ //////////////

    //////////////// ........ profile ........ //////////////
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'updateInfo'])->name('profile.updateInfo');
    Route::post('profile', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

    //////////////// ........ dashboard ........ //////////////
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('home');



    //////////////// ........ admins ........ //////////////
    Route::resource('admins', AdminController::class);
    Route::get('trash/admins/{id?}', [AdminController::class, 'index'])->name('admins.trash');
    Route::post('trash/admins/{id}', [AdminController::class, 'restore'])->name('admins.restore');
    Route::delete('trash/admins/{id}', [AdminController::class, 'finalDelete'])->name('admins.finalDelete');

    //////////////// ........ categories ........ //////////////
    Route::resource('categories', CategoryController::class);
    Route::get('trash/categories/{id?}', [CategoryController::class, 'index'])->name('categories.trash');
    Route::post('trash/categories/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('trash/categories/{id}', [CategoryController::class, 'finalDelete'])->name('categories.finalDelete');
    Route::get('sort/categories/', [CategoryController::class, 'sortShow'])->name('categories.sort.show');
    Route::post('sort/categories/', [CategoryController::class, 'sortSave'])->name('categories.sort.save');

    //////////////// ........ partners ........ //////////////
    Route::resource('partners', PartnerController::class);
    Route::get('sort/partners/', [PartnerController::class, 'sortShow'])->name('partners.sort.show');
    Route::post('sort/partners/', [PartnerController::class, 'sortSave'])->name('partners.sort.save');


    //////////////// ........ slider ........ //////////////
    Route::resource('sliders', SliderController::class);

    //////////////// ........ projects ........ //////////////
    Route::resource('projects', ProjectController::class);
    Route::get('trash/projects/{id?}', [ProjectController::class, 'index'])->name('projects.trash');
    Route::post('trash/projects/{id}', [ProjectController::class, 'restore'])->name('projects.restore');
    Route::delete('trash/projects/{id}', [ProjectController::class, 'finalDelete'])->name('projects.finalDelete');
    Route::post('uploadImage/projects', [ProjectController::class, 'uploadImage'])->name('projects.uploadImage');

 //////////////// ........ products ........ //////////////
    Route::resource('products', ProductController::class);
    Route::get('trash/products/{id?}', [ProductController::class, 'index'])->name('products.trash');
    Route::post('trash/products/{id}', [ProductController::class, 'restore'])->name('products.restore');
    Route::delete('trash/products/{id}', [ProductController::class, 'finalDelete'])->name('products.finalDelete');
    Route::post('uploadImage/products', [ProductController::class, 'uploadImage'])->name('products.uploadImage');


    Route::post('uploadImage', [\App\Http\Controllers\Admin\UploadImageController::class, 'uploadImage'])->name('uploadImage');

});
