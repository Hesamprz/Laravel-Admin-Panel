<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::resource('products', ProductController::class);

// ================== Product Routes ===================
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


// ================== User Routes ===================
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


// ================== Order Routes ===================
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');


// ================== OrderItem Routes ===================
Route::get('/order-items', [OrderItemController::class, 'index'])->name('order-items.index');
Route::get('/order-items/create', [OrderItemController::class, 'create'])->name('order-items.create');
Route::post('/order-items', [OrderItemController::class, 'store'])->name('order-items.store');
Route::get('/order-items/{order_item}', [OrderItemController::class, 'show'])->name('order-items.show');
Route::get('/order-items/{order_item}/edit', [OrderItemController::class, 'edit'])->name('order-items.edit');
Route::put('/order-items/{order_item}', [OrderItemController::class, 'update'])->name('order-items.update');
Route::delete('/order-items/{order_item}', [OrderItemController::class, 'destroy'])->name('order-items.destroy');