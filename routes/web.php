<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/starter', function () {
    return view('starter');
});

Route::get('/login', function (){
    return view('forms.login');
})->name('login.view');
Route::post('/login', [AuthController::class,'login'])->name('login.action');

Route::get('/register', function(){
    return view('forms.register');
})->name('register.view');
Route::post('/register', [AuthController::class,'register'])->name('register.action');

Route::post('/logout', [AuthController::class,'logout'])->name('logout');


Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);

Route::get('/profile/{profile}', [ProfileController::class,'show'])->name('profile.show')->middleware('auth');
Route::get('/profile', [ProfileController::class,'index'])->name('profile.index')->middleware('admin');
Route::get('/profile/edit', [ProfileController::class,'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile/edit', [ProfileController::class,'update'])->name('profile.update')->middleware('auth');
Route::post('/profile/me', [ProfileController::class,'show_me'])->name('profile.me')->middleware('auth');


// * Cart Routes:

Route::get('/cart', [CartController::class,'show'])->name('cart.show')->middleware('auth');
Route::post('/cart/add-to-cart', [CartController::class,'addToCart'])->name('cart.addItem')->middleware('auth');
