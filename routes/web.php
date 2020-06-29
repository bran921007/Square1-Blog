<?php

use App\Post;
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


Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'HomeController@index')->name('home');
Route::post('/order', 'HomeController@sortByPublicationDate')->name('order');
Route::get('/post/{slug}', 'HomeController@getPost')->name('post');

Route::group(['middleware' => 'auth','prefix'=>'panel'], function () {

    Route::get('/home', 'PostController@index')->name('dashboard');
    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::post('/post/store', 'PostController@store')->name('post.store');
    Route::post('/order', 'PostController@sortByPublicationDate')->name('order.panel');

});
