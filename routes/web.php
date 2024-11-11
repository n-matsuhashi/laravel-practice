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
    Route::get('/{id}/edit', 'App\Http\Controllers\OfficesController@edit')->name('edit');
    Route::get('/{id}', 'App\Http\Controllers\OfficesController@show')->name('show');
    Route::put('/{id}', 'App\Http\Controllers\OfficesController@update')->name('update');
    Route::delete('/{id}', 'App\Http\Controllers\OfficesController@destroy')->name('destroy');
});

// 認証用のルート
Route::get('/login', 'App\Http\Controllers\AuthController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('login.process');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
