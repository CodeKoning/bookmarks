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

Route::redirect('/', 'home');
Route::resource('bookmarks', 'App\Http\Controllers\BookmarksController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('bookmarks/create', 'App\Http\Controllers\BookmarksController@store');
Route::put('bookmarks/{bookmark}/edit', 'App\Http\Controllers\BookmarksController@update');
Route::delete('bookmarks/{bookmark}/destroy', 'App\Http\Controllers\BookmarksController@destroy');
