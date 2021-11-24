<?php
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Admin\Auth\LoginController;
use \App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use \App\Http\Controllers\Admin\Auth\ResetPasswordController;
use \App\Http\Controllers\Admin\Auth\ConfirmPasswordController;

use \App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Admin\AdminController;
use \App\Http\Controllers\Admin\DashboardController;
use \App\Http\Controllers\Admin\ProfileController;
use \App\Http\Controllers\Admin\RoleController;
use \App\Http\Controllers\Admin\PermissionController;
use \App\Http\Controllers\Admin\SectionController;
use \App\Http\Controllers\Admin\CategoryController;
use \App\Http\Controllers\Admin\BlockController;
use \App\Http\Controllers\Admin\ItemController;
use \App\Http\Controllers\Admin\SliderController;
use \App\Http\Controllers\Admin\ServiceController;
use \App\Http\Controllers\Admin\ProjectController;
use \App\Http\Controllers\Admin\PageController;
use \App\Http\Controllers\Admin\NewsletterController;
use \App\Http\Controllers\Admin\ContactController;

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

    //////////////// ........ roles ........ //////////////
    Route::resource('roles', RoleController::class);
    Route::get('trash/roles/{id?}', [RoleController::class, 'index'])->name('roles.trash');
    Route::post('trash/roles/{id}', [RoleController::class, 'restore'])->name('roles.restore');
    Route::delete('trash/roles/{id}', [RoleController::class, 'finalDelete'])->name('roles.finalDelete');

    //////////////// ........ permissions ........ //////////////
    Route::get('roles/permission/{id}', [PermissionController::class, 'index'])->name('permission.index');
    Route::post('roles/permission/{id}', [PermissionController::class, 'update'])->name('permission.update');


    //////////////// ........ admins ........ //////////////
    Route::resource('admins', AdminController::class);
    Route::get('trash/admins/{id?}', [AdminController::class, 'index'])->name('admins.trash');
    Route::post('trash/admins/{id}', [AdminController::class, 'restore'])->name('admins.restore');
    Route::delete('trash/admins/{id}', [AdminController::class, 'finalDelete'])->name('admins.finalDelete');

    //////////////// ........ users ........ //////////////
    Route::resource('users', UserController::class);
    Route::get('orders/users/{id?}', [UserController::class, 'orders'])->name('users.orders');
    Route::get('trash/users/{id?}', [UserController::class, 'index'])->name('users.trash');
    Route::post('trash/users/{id}', [UserController::class, 'restore'])->name('users.restore');
    Route::delete('trash/users/{id}', [UserController::class, 'finalDelete'])->name('users.finalDelete');

    //////////////// ........ sections ........ //////////////
    Route::resource('sections', SectionController::class);
    Route::get('trash/sections/{id?}', [SectionController::class, 'index'])->name('sections.trash');
    Route::post('trash/sections/{id}', [SectionController::class, 'restore'])->name('sections.restore');
    Route::delete('trash/sections/{id}', [SectionController::class, 'finalDelete'])->name('sections.finalDelete');
    Route::get('sort/sections/', [SectionController::class, 'sortShow'])->name('sections.sort.show');
    Route::post('sort/sections/', [SectionController::class, 'sortSave'])->name('sections.sort.save');

    //////////////// ........ categories ........ //////////////
    Route::resource('categories', CategoryController::class);
    Route::get('trash/categories/{id?}', [CategoryController::class, 'index'])->name('categories.trash');
    Route::post('trash/categories/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('trash/categories/{id}', [CategoryController::class, 'finalDelete'])->name('categories.finalDelete');
    Route::get('sort/categories/', [CategoryController::class, 'sortShow'])->name('categories.sort.show');
    Route::post('sort/categories/', [CategoryController::class, 'sortSave'])->name('categories.sort.save');


    //////////////// ........ slider ........ //////////////
    Route::resource('sliders', SliderController::class);

    //////////////// ........ blocks ........ //////////////
    Route::resource('blocks', BlockController::class);
    Route::get('toggle/blocks/{id?}', [BlockController::class, 'toggleView'])->name('blocks.toggleView');

    //////////////// ........ items ........ //////////////
    Route::resource('items', ItemController::class);

    //////////////// ........ services ........ //////////////
    Route::resource('services', ServiceController::class);
    Route::get('trash/services/{id?}', [ServiceController::class, 'index'])->name('services.trash');
    Route::post('trash/services/{id}', [ServiceController::class, 'restore'])->name('services.restore');
    Route::delete('trash/services/{id}', [ServiceController::class, 'finalDelete'])->name('services.finalDelete');
    Route::post('uploadImage/services', [ServiceController::class, 'uploadImage'])->name('services.uploadImage');

    //////////////// ........ projects ........ //////////////
    Route::resource('projects', ProjectController::class);
    Route::get('trash/projects/{id?}', [ProjectController::class, 'index'])->name('projects.trash');
    Route::post('trash/projects/{id}', [ProjectController::class, 'restore'])->name('projects.restore');
    Route::delete('trash/projects/{id}', [ProjectController::class, 'finalDelete'])->name('projects.finalDelete');
    Route::post('uploadImage/projects', [ProjectController::class, 'uploadImage'])->name('projects.uploadImage');

    //////////////// ........ page ........ //////////////
    Route::resource('pages', PageController::class);
    Route::get('trash/pages/{id?}', [PageController::class, 'index'])->name('pages.trash');
    Route::post('trash/pages/{id}', [PageController::class, 'restore'])->name('pages.restore');
    Route::delete('trash/pages/{id}', [PageController::class, 'finalDelete'])->name('pages.finalDelete');
    Route::post('uploadImage/pages', [PageController::class, 'uploadImage'])->name('pages.uploadImage');

    //////////////// ........ Newsletter ........ //////////////
    Route::resource('newsletters', NewsletterController::class);
    Route::get('trash/newsletters/{id?}', [NewsletterController::class, 'index'])->name('newsletters.trash');
    Route::post('trash/newsletters/{id}', [NewsletterController::class, 'restore'])->name('newsletters.restore');
    Route::delete('trash/newsletters/{id}', [NewsletterController::class, 'finalDelete'])->name('newsletters.finalDelete');

    //////////////// ........ contacts ........ //////////////
    Route::resource('contacts', ContactController::class);
    Route::get('trash/contacts/{id?}', [ContactController::class, 'index'])->name('contacts.trash');
    Route::post('trash/contacts/{id}', [ContactController::class, 'restore'])->name('contacts.restore');
    Route::delete('trash/contacts/{id}', [ContactController::class, 'finalDelete'])->name('contacts.finalDelete');

    //////////////// ........ messages ........ //////////////
    Route::resource('messages', \App\Http\Controllers\Admin\MessageController::class);
});
