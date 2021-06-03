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

Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/posts/create', 'PostController@create')->name('create');
Route::post('/posts/store', 'PostController@store')->name('store');
Route::get('/posts/view/{id}/{name}', 'PostController@view')->name('view');
Route::get('/posts/edit/{id}', 'PostController@edit')->name('edit');
Route::post('/posts/update/{id}', 'PostController@update')->name('update');
Route::get('/posts/delete/{id}', 'PostController@delete')->name('delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
