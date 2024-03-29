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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('posts', 'App\Http\Controllers\PostsController@index');
Route::get('posts/create', 'App\Http\Controllers\PostsController@create');
Route::post('posts/store', 'App\Http\Controllers\PostsController@store');
Route::get('posts/{id}/edit', 'App\Http\Controllers\PostsController@edit');
Route::put('posts/{id}/update', 'App\Http\Controllers\PostsController@update');
Route::delete('posts/del/{id}', 'App\Http\Controllers\PostsController@destroy');
Route::post('/posts/like/{id}','App\Http\Controllers\PostsController@switchLike')->name('like_post');
Route::post('/posts/unlike/{id}','App\Http\Controllers\PostsController@switchUnlike')->name('unlike_post');
// Route::get('logout', array('uses' => 'LoginController@logout'));