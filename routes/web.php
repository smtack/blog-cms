<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('index');
Route::get('about', [BlogController::class, 'about'])->name('about');

Route::get('contact', [BlogController::class, 'contact'])->name('contact');
Route::post('mail', MailController::class)->name('mail');

Route::get('post/{id}', [BlogController::class, 'post'])->name('post');
Route::get('search', [BlogController::class, 'search'])->name('search');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin');
});

Route::middleware('auth')->group(function () {
    Route::get('/settings', [AdminController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [AdminController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [AdminController::class, 'destroy'])->name('profile.destroy');

    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);

    Route::patch('toggle-feature/{id}', [PostController::class, 'toggleFeatured'])->name('posts.feature');
});

require __DIR__.'/auth.php';
