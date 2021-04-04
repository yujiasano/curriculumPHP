<?php

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

// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'posts', 'middleware' => 'auth'], function() {
    Route::get('index', 'PostController@index');
    Route::post('store', 'PostController@store')->name('posts.store');
    Route::get('destroy', 'PostController@destroy')->name('posts.destory');
});
