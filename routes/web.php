<?php

use App\Http\Controllers\backend\permissions\{assignController, roleController, permissionController, userController};
use App\Http\Controllers\backend\toko\{jenisBerasController, berasController, ordersController};
use App\Http\Controllers\backend\customer\{berasController as customerBerasController};
use App\Http\Controllers\frontend\homeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('login');
});

Route::middleware('auth')
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

Route::middleware('auth')
    ->prefix('customer')
    ->group(function () {
        Route::prefix('order')->group(function () {
            Route::get('checkout', [ordersController::class, 'checkout'])->name('checkout');
        });

        // route customer to handle lihat/oder beras
        Route::prefix('cari')->group(function () {
            Route::get('beras', [customerBerasController::class, 'cari'])->name('cari-beras');
            Route::get('beras/{id}', [customerBerasController::class, 'lihat'])->name('lihat-beras');
            // Route::post('beras', [customerBerasController::class, 'store'])->name('beli-beras');
            Route::post('/beras/{id}/store', [customerBerasController::class, 'store'])->name('beli-beras');
            Route::get('orders', [ordersController::class, 'index'])->name('customer.orders');
        });
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
