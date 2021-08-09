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

Route::get('/', 'App\Http\Controllers\MainController@index')->name('home');
Route::get('/catalog/{category}', 'App\Http\Controllers\CatalogController@category')->name('category');
Route::get('/catalog', 'App\Http\Controllers\CatalogController@index')->name('catalog');
Route::get('/products/{car}', 'App\Http\Controllers\CatalogController@product')->name('product');
Route::resource('/articles', 'App\Http\Controllers\ArticleController');
Route::get('/account', 'App\Http\Controllers\MainController@dashboard')->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';
Route::get('/salons', 'App\Http\Controllers\MainController@salons')->name('salons');
Route::get('/{page}', 'App\Http\Controllers\MainController@page')->name('page');
