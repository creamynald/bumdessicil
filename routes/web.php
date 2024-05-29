<?php

use App\Http\Controllers\backend\permissions\{assignController, roleController, permissionController, userController};
use App\Http\Controllers\backend\toko\{jenisBerasController, berasController, ordersController};
use App\Http\Controllers\frontend\homeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class, 'index']);

Route::middleware('has.role')
    ->prefix('admin')
    ->group(function () {
        Route::get('dashboard', function () {
            return view('backend.dashboard');
        })->name('dashboard');
        Route::prefix('role-and-permission')
            ->middleware('permission:permission')
            ->group(function () {
                Route::resource('roles', roleController::class);
                Route::resource('permissions', permissionController::class);
                Route::resource('assignable', assignController::class);
                Route::resource('assign/user', userController::class);
            });

        Route::prefix('toko')->group(function () {
            Route::resource('jenis-beras', jenisBerasController::class);
            Route::resource('beras', berasController::class);
            Route::resource('orders', ordersController::class);
        });
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
