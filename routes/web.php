<?php

use App\Http\Controllers\Auth\GoogleSocialiteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Tasks\TasksAjaxDatatablesController;
use App\Http\Controllers\Tasks\TasksController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->to(route('home'));
});

Auth::routes();

// routes for authenticated
Route::middleware(['auth:web'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/profile', [UsersController::class, 'edit'])->name('profile');
    // route for change language
    Route::post('/language/{locale}', [LocalizationController::class, 'setLocale'])->name('change-lang');

    // routes for control tasks
    Route::resource('tasks', TasksController::class)->names('tasks')
        ->only('index', 'create', 'show', 'edit');

    // routes for ajax data
    Route::prefix('ajax')->name('ajax.')->group(function () {
        // get tasks in datatables 
        Route::get('/tasks/get-all-tasks', [TasksAjaxDatatablesController::class, 'getTasks'])->name('tasks.get-tasks');
    });
});

// redirect to google login page
Route::get('/auth/google', [GoogleSocialiteController::class, 'redirectToGoogle'])->name('google-login');
// handle the callback
Route::get('/callback/google', [GoogleSocialiteController::class, 'handleCallback']);
