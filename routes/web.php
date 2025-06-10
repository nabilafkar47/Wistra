<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin;

Route::middleware(['auth', AdminMiddleware::class])->get('/', function () {
    return redirect()->route('admin.destinations.index');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'invalidLogout']);

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('cities', Admin\CityController::class)->only([
        'index',
        'store',
        'update',
        'destroy'
    ]);

    Route::resource('categories', Admin\CategoryController::class)->only([
        'index',
        'store',
        'update',
        'destroy'
    ]);

    Route::resource('destinations', Admin\DestinationController::class)->only([
        'index',
        'store',
        'update',
        'destroy'
    ]);

    Route::resource('sliders', Admin\SliderController::class)->only([
        'index',
        'store',
        'update',
        'destroy'
    ]);

    Route::resource('reviews', Admin\ReviewController::class)->only([
        'index',
        'store',
        'update',
        'destroy'
    ]);

    Route::resource('destination-photos', Admin\DestinationImageController::class)->only([
        'index',
        'store',
        'update',
        'destroy'
    ]);

    Route::resource('users', Admin\UserController::class)->only([
        'index',
        'store',
        'update',
        'destroy'
    ]);

    Route::resource('dashboard', Admin\DashboardController::class)->only([
        'index'
    ]);
});
