<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


/* Rotas CRUD Vendedor */
Route::get('/seller-register', function() {
    return view('seller.registration');
})->middleware(['auth'])->name('seller-registration');

Route::post('/seller-register', [SellerController::class, 'register'])->middleware(['auth'])->name('seller-register');


require __DIR__.'/auth.php';
