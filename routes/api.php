<?php

use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DestroyController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(["namespace" => "App\Http\Controllers\Post", "middleware" => "jwt.auth"], function () {
    Route::get('posts', IndexController::class)->name('posts.show');
    Route::get('posts/create', CreateController::class)->name('posts.create');
    Route::post('posts', StoreController::class)->name('posts.store');
    Route::get('posts/{post}', ShowController::class)->name('posts.show');
    Route::get('posts/{post}/edit', EditController::class)->name('posts.edit');
    Route::patch('posts/{post}', UpdateController::class)->name('posts.update');
    Route::delete('posts/{post}', DestroyController::class)->name('posts.destroy');
});
