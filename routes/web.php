<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Permissions\{RoleController, PermissionController, AssignController, UserController};

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
        Route::delete('{post:slug}/destroy', [UserController::class, 'destroy'])->name('posts.destroy');
    });

    // Route RoleController
    Route::prefix('role-and-permission')->namespace('Permissions')->group(function () {
        // Route Permission
        Route::get('assignable', [AssignController::class, 'create'])->name('assign.create');
        Route::post('assignable', [AssignController::class, 'store']);
        Route::get('assignable/{role}/edit', [AssignController::class, 'edit'])->name('assign.edit');
        Route::put('assignable/{role}/edit', [AssignController::class, 'update']);
        //Route User
        Route::get('assign/user', [UserController::class, 'create'])->name('assign.user.create');
        Route::post('assign/user', [UserController::class, 'store']);
        Route::get('assign/{user}/user', [UserController::class, 'edit'])->name('assign.user.edit');
        Route::put('assign/{user}/user', [UserController::class, 'update']);

        Route::prefix('roles')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('roles.index');
            Route::post('create', [RoleController::class, 'store'])->name('roles.create');

            Route::get('{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
            Route::put('{role}/edit', [RoleController::class, 'update']);
        });

        Route::prefix('permissions')->group(function () {
            Route::get('/', [PermissionController::class, 'index'])->name('permissions.index');
            Route::post('create', [PermissionController::class, 'store'])->name('permissions.create');

            Route::get('{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
            Route::put('{permission}/edit', [PermissionController::class, 'update']);
        });
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
