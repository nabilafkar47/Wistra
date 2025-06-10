<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\HaversineController;
use App\Http\Controllers\Api\UserBasedController;
use App\Http\Controllers\Api\DestinationController;
use App\Http\Controllers\Api\DestinationImageController;
use App\Http\Controllers\Api\UserBasedController2;

Route::name('api.')->group(function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::get('destinations', [DestinationController::class, 'index']);


    Route::get('cities', [CityController::class, 'index']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('sliders', [SliderController::class, 'index']);
});

Route::middleware('auth:sanctum')->name('api.')->group(function () {

    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('user/profile', [UserController::class, 'index']);
    Route::put('user/profile', [UserController::class, 'update']);
    Route::get('user/favorites', [FavoriteController::class, 'index']);
    Route::delete('user/favorites', [FavoriteController::class, 'deleteAllFavorites']);

    Route::get('destinations}', [DestinationController::class, 'index']);
    Route::get('destinations/{destinationId}', [DestinationController::class, 'show']);

    Route::post('destinations/{destinationId}/favorites/toggle', [FavoriteController::class, 'toggleFavorite']);

    Route::post('destinations/{destinationId}/reviews', [ReviewController::class, 'store']);
    Route::get('destinations/{destinationId}/reviews', [ReviewController::class, 'index']);
    Route::put('destinations/{destinationId}/reviews/', [ReviewController::class, 'update']);
    Route::delete('destinations/{destinationId}/reviews/', [ReviewController::class, 'destroy']);
    Route::get('destinations/{destinationId}/reviews/user', [ReviewController::class, 'getUserReview']);

    Route::get('destinations/{destinationId}/images', [DestinationImageController::class, 'index']);

    Route::get('cities', [CityController::class, 'index']);
    Route::get('categories', [CategoryController::class, 'index']);

    Route::get('recommendations/ubcf', [UserBasedController::class, 'index']);
    Route::get('recommendations/haversine', [HaversineController::class, 'index']);
});
