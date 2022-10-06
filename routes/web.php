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


Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    Route::group(['middleware' => ['auth']], function() {
        Route::get('/sellers-list', 'SellerController@index');
        Route::get('/seller-register', 'SellerController@new');
        Route::post('/seller-register', 'SellerController@register')->name('seller-register');
        Route::post('/seller-delete/{id}', 'SellerController@destroy');
    });
});
/* Rotas CRUD Vendedor */



require __DIR__.'/auth.php';
