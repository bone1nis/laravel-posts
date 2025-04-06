<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::get('/', function () {
//    return Inertia::render('Welcome');
//})->name('home');
//
//Route::get('dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
    Route::get('posts', IndexController::class)->name('posts.index');
    Route::get('posts/create', CreateController::class)->name('posts.create');
    Route::post('posts', StoreController::class)->name('posts.store');
    Route::get('posts/{post}', ShowController::class)->name('posts.show');
    Route::get('posts/{post}/edit', EditController::class)->name('posts.edit');
    Route::put('posts/{post}', UpdateController::class)->name('posts.update');
    Route::delete('posts/{post}', DestroyController::class)->name('posts.destroy');
});



Route::get("/main", [App\Http\Controllers\MainController::class, 'index'])->name("main.index");
Route::get("/about", [App\Http\Controllers\AboutController::class, 'index'])->name("about.index");
Route::get("/contact", [App\Http\Controllers\ContactController::class, 'index'])->name("contact.index");

Route::get("cakes", [App\Http\Controllers\CakeController::class, 'index']);

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
