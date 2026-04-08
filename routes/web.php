<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RolePermissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : view('welcome');
})->name('home');

Route::middleware('guest')->group(function (): void {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function (): void {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function (): void {
        Route::resource('users', AdminUserController::class);
        Route::get('roles-permissions', [RolePermissionController::class, 'index'])->name('roles.permissions');
    });

    Route::middleware('role:admin,employee')->group(function (): void {
        Route::resource('staff/products', ProductController::class)->names('staff.products');
        Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
        Route::patch('/customers/{user}/credit', [CustomerController::class, 'addCredit'])->name('customers.credit');
    });

    Route::middleware('role:customer')->group(function (): void {
        Route::get('/store', [PurchaseController::class, 'index'])->name('store.index');
        Route::post('/store/products/{product}/purchase', [PurchaseController::class, 'store'])->name('store.purchase');
        Route::get('/account', [CustomerController::class, 'account'])->name('account.index');
    });
});