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

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::resource('posts', 'PostController')->only('index', 'show');
Route::get('author/{user_id}', 'PostController@getPostsByAuthor')->name('postByAuthor');

Route::prefix('admin')->name('admin.')->middleware('roles:admin', 'auth')->namespace('Admin')->group(function (){
    Route::resource('users', 'UserController');
    Route::resource('posts', 'PostController')->except('show');
});

Auth::routes();
