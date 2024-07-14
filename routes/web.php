<?php

use App\Http\Controllers\backend\permissions\{assignController, roleController, permissionController, userController};
use App\Http\Controllers\backend\toko\{jenisBerasController, berasController, ordersController};
use App\Http\Controllers\backend\customer\{berasController as customerBerasController, orderController as customerOrderController};
use App\Http\Controllers\backend\admin\{RekapController};
use App\Http\Controllers\backend\dashboardController;
use App\Http\Controllers\chat\ChatController;
use App\Http\Controllers\frontend\homeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class, 'index']);

Route::middleware('auth')
    ->prefix('admin')
    ->group(function () {
        Route::get('dashboard',[dashboardController::class, 'index'])->name('dashboard');
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
        Route::resource('list-bumdes', RekapController::class);
        Route::resource('list-customer', RekapController::class);
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

            Route::get('pesanan', [customerOrderController::class, 'index'])->name('customer.orders');
            Route::get('pesanan/{id}', [customerOrderController::class, 'detail'])->name('customer.orders.detail');
        });
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
