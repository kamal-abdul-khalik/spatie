<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\Posts\{PostController, CategoryController, TagController};
use App\Http\Controllers\Profile\{ProfileController, UpdatePasswordController};
use App\Http\Controllers\Permissions\{RoleController, PermissionController, AssignController, UserController};
use UniSharp\LaravelFilemanager\Lfm;

Route::get('/', function () {
    return view('front');
});


//route dashboard
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);


    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/', [ProfileController::class, 'updateProfileInformations']);
    });

    Route::prefix('update-password')->group(function () {
        Route::get('/', [UpdatePasswordController::class, 'edit'])->name('password.edit');
        Route::put('/', [UpdatePasswordController::class, 'updatePassword']);
    });

    // Route RoleController
    Route::prefix('role-and-permission')->namespace('Permissions')->group(function () {
        // Route Permission
        Route::prefix('assigns')->group(function () {
            Route::get('/', [AssignController::class, 'create'])->name('assigns.create');
            Route::post('/', [AssignController::class, 'store'])->name('assigns.store');
            Route::get('{role}/edit', [AssignController::class, 'edit'])->name('assigns.edit');
            Route::put('{role}/edit', [AssignController::class, 'update'])->name('assigns.update');
        });
        //Route User
        Route::prefix('permissionUsers')->group(function () {
            Route::get('/', [UserController::class, 'create'])->name('permissionUsers.create');
            Route::post('/', [UserController::class, 'store'])->name('permissionUsers.store');
            Route::get('{user}/user', [UserController::class, 'edit'])->name('permissionUsers.edit');
            Route::put('{user}/user', [UserController::class, 'update'])->name('permissionUsers.update');
        });

        Route::prefix('roles')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('roles.index');
            Route::post('create', [RoleController::class, 'store'])->name('roles.create');

            Route::get('{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
            Route::put('{role}/edit', [RoleController::class, 'update'])->name('roles.update');
        });

        Route::prefix('permissions')->group(function () {
            Route::get('/', [PermissionController::class, 'index'])->name('permissions.index');
            Route::post('create', [PermissionController::class, 'store'])->name('permissions.create');

            Route::get('{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
            Route::put('{permission}/edit', [PermissionController::class, 'update'])->name('permissions.update');
        });
    });

    Route::prefix('filemanager')->group(function () {
        Lfm::routes();
        Route::get('image', [FileManagerController::class, 'show'])->name('images.view');
    });
});
