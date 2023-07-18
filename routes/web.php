<?php

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MarketplaceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GeneralController::class, 'index'])->name('index');

Route::get('/registration', [SellerController::class, 'create'])->name('seller.create');
Route::post('/store', [SellerController::class, 'store'])->name('seller.store');
Route::get('/enter', [SellerController::class, 'login'])->name('seller.enter');
Route::get('/autorize', [SellerController::class, 'autorize'])->name('seller.autorize');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('admin')->group(function() {
        Route::prefix('admin')->group(function () {
            Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
            Route::get('/users', [UserController::class, 'users'])->name('admin.users');
            Route::get('/marketplace/create', [MarketplaceController::class, 'create'])->name('admin.marketplace.create');
            Route::get('/marketplace/update/{id_marketplace}', [MarketplaceController::class, 'update'])->name('admin.marketplace.update');
            Route::post('/marketplace/create', [MarketplaceController::class, 'store'])->name('admin.marketplace.store');
            Route::post('/marketplace/delete', [MarketplaceController::class, 'delete'])->name('admin.marketplace.delete');
            Route::get('/marketplaces', [MarketplaceController::class, 'viewAll'])->name('admin.marketplaces');
        });
    });
});

require __DIR__.'/auth.php';
