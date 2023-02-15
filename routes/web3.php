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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/home', 'HomeController@index')->name('home.index');
    Route::get('/', 'LoginController@show')->name('login.show');
    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        Route::get('/cad-produto', 'ProdutoController@index');
        Route::post('/cad-produto', 'ProdutoController@create')->name('product.create');
        Route::get('/lista-produtos', 'ProdutoController@list');
        Route::get('/lista-produtos/{id}', 'ProdutoController@edit')->name('product.edit');
        Route::post('/lista-produtos/{id}', 'ProdutoController@update')->name('product.update');
        Route::get('/lista-produtos/excel', 'ExcelController@product');

        Route::get('/cad-cliente', 'ClienteController@index');
        Route::get('/lista-clientes', 'ClienteController@list');
        Route::post('/cad-cliente', 'ClienteController@create')->name('client.create');
        Route::get('/lista-clientes/excel', 'ExcelController@client');
        Route::get('/lista-clientes/{id}', 'ClienteController@edit')->name('client.edit');
        Route::post('/lista-clientes/{id}', 'ClienteController@update')->name('client.update');
        Route::post('/apagar-cliente/{id}', 'ClienteController@apagar')->name('client.deletar');

        Route::get('/lista-fatura', 'HomeController@index')->name('home.index');
        Route::get('/emissao-fatura', 'FaturaController@index');
        Route::post('/emissao-fatura', 'FaturaController@create')->name('bill.create');
        Route::get('/fatura/{id}', 'FaturaController@show')->name('bill.show');
        Route::post('/emitir/{id}', 'FaturaController@emitir')->name('bill.emitir');
        Route::post('/cancelar/{id}', 'FaturaController@cancelar')->name('bill.cancelar');
        Route::post('/apagar/{id}', 'FaturaController@apagar')->name('bill.deletar');
        Route::get('/imprimir/{id}', 'FaturaController@print')->name('bill.print');
        Route::get('/lista-faturas/excel', 'ExcelController@bill');

        Route::get('/administrador', 'AdministratorController@index');
        Route::post('/administrador', 'AdministratorController@create')->name('administrator.create');
        Route::get('/administrador/{id}/edit', 'AdministratorController@list');
        Route::post('/administrador/{id}', 'AdministratorController@edit')->name('administrator.edit');       
    });
});
