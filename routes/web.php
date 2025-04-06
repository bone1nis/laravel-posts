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

Route::get("posts", [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');

Route::get("posts/create", [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::post("posts", [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');

Route::get("posts/{post}", [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Route::get("posts/{post}/edit", [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
Route::put("posts/{post}", [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');

Route::delete("posts/{post}", [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');



Route::get("posts/update", [App\Http\Controllers\PostController::class, 'update']);
Route::get("posts/delete", [App\Http\Controllers\PostController::class, 'delete']);
Route::get("posts/first_or_create", [App\Http\Controllers\PostController::class, 'firstOrCreate']);
Route::get("posts/update_or_create", [App\Http\Controllers\PostController::class, 'updateOrCreate']);


Route::get("/main", [App\Http\Controllers\MainController::class, 'index'])->name("main.index");
Route::get("/about", [App\Http\Controllers\AboutController::class, 'index'])->name("about.index");
Route::get("/contact", [App\Http\Controllers\ContactController::class, 'index'])->name("contact.index");

Route::get("cakes", [App\Http\Controllers\CakeController::class, 'index']);

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
