<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Permissions\RoleController;

Route::get('/', function () {
    return view('front');
});


//route dashboard
Route::middleware('has.role', 'auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('post')->group(function () {
        //route posts
        Route::get('/', [PostController::class, 'index'])->name('posts.index');

        Route::get('create', [PostController::class, 'create'])->name('posts.create');
        Route::post('create', [PostController::class, 'store'])->name('posts.store');

        Route::get('{post:slug}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('{post:slug}/edit', [PostController::class, 'update'])->name('posts.update');

        Route::delete('{post:slug}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');
    });

    // Route RoleController
    Route::prefix('role-and-permission')->namespace('Permissions')->group(function () {
        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
        Route::post('roles/create', [RoleController::class, 'store'])->name('roles.create');

        Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('roles/{role}/edit', [RoleController::class, 'update']);

        Route::delete('roles/{role}/destroy', [RoleController::class, 'destroy'])->name('roles.destroy');
    });

    // Route UserController
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');

        Route::get('create', [UserController::class, 'create'])->name('users.create');
        Route::post('create', [UserController::class, 'store'])->name('users.store');

        Route::get('{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('{id}/edit', [UserController::class, 'update'])->name('users.update');

        Route::delete('{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
    });
});
