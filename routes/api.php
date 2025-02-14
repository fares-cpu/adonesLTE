<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/product', [ProductController::class, 'index'])->name('api.product.index');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('api.product.show');

Route::get('/category', [CategoryController::class, 'index'])->name('api.category.index');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('api.category.show');

Route::get('/cart', [CartController::class, 'show'])->name('api.cart.show');
