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

Route::get('/hello', 'App\Http\Controllers\HelloController@index');

Route::prefix('offices')->name('offices.')->group(function () {
    Route::get('/', 'App\Http\Controllers\OfficesController@index')->name('index');
    Route::post('/', 'App\Http\Controllers\OfficesController@store')->name('store');
    Route::get('/create', 'App\Http\Controllers\OfficesController@create')->name('create');
    Route::get('/{office}/edit', 'App\Http\Controllers\OfficesController@edit')->name('edit');
    Route::get('/{office}', 'App\Http\Controllers\OfficesController@show')->name('show');
    Route::put('/{office}', 'App\Http\Controllers\OfficesController@update')->name('update');
    Route::delete('/{office}', 'App\Http\Controllers\OfficesController@destroy')->name('destroy');
});
