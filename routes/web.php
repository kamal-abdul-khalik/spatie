<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\UserController;

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

    // Route UserController
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');

        Route::get('create', [UserController::class, 'create'])->name('users.create');
        Route::post('create', [UserController::class, 'store']);

        Route::get('{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('{id}/edit', [UserController::class, 'update']);

        Route::delete('{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
    });
});
