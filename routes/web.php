<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\DashboardController;

//route dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('post')->group(function () {
        //route posts
        Route::get('/', [PostController::class, 'index'])->name('post.index');

        Route::get('create', [PostController::class, 'create'])->name('post.create');
        Route::post('create', [PostController::class, 'store']);

        Route::get('{post:slug}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::put('{post:slug}/edit', [PostController::class, 'update']);

        Route::delete('{post:slug}/destroy', [PostController::class, 'destroy'])->name('post.destroy');
    });
});
