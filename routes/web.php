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
        /* Seller Routes */
        Route::get('/sellers-list', 'SellerController@index');
        Route::get('/seller-register', 'SellerController@new');
        Route::get('/seller-edit/{id}', 'SellerController@edit');
        Route::post('/seller-edit/{id}', 'SellerController@save')->name('seller-edit');
        Route::post('/seller-register', 'SellerController@register')->name('seller-register');
        Route::post('/seller-delete/{id}', 'SellerController@destroy');
        /* Product Routes */
        Route::get('/products-list', 'ProductController@index');
        Route::get('/product-register', 'ProductController@new');
        Route::get('/product-edit/{id}', 'ProductController@edit');
        Route::post('/product-edit/{id}', 'ProductController@save')->name('product-edit');
        Route::post('/product-register', 'ProductController@register')->name('product-register');
        Route::post('/product-delete/{id}', 'ProductController@destroy');
        /* Sales Routes */
        Route::get('/sales-list', 'SaleController@index');
        Route::get('/sale-register', 'SaleController@new');
        Route::get('/sale-edit/{id}', 'SaleController@edit');
        Route::post('/sale-edit/{id}', 'SaleController@save')->name('sale-edit');
        Route::post('/sale-register', 'SaleController@register')->name('sale-register');
        Route::post('/sale-delete/{id}', 'SaleController@destroy');
        /* Report Routes */
        Route::get('/reports', 'ReportController@index');
        Route::get('/reports/products', 'ReportController@products');
        Route::get('/reports/sellers', 'ReportController@sellers');
        
    });
});



require __DIR__.'/auth.php';
