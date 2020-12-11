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
    return view('index');
});
Route::get('about', "App\Http\Controllers\AboutController@index")->name('about');
Route::resource('contact', '\App\Http\Controllers\ContactController');
Route::resource('blog', '\App\Http\Controllers\BlogController');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => '\App\Http\Controllers\Admin'], function () {

    Route::get('posts/trashed', 'PostController@trashed')->name('posts.trashed');
    Route::post('posts/restore/{id}', 'PostController@restore')->name('posts.restore');
    Route::delete('posts/force/{id}', 'PostController@force')->name('posts.force');
    Route::resource('posts', 'PostController');

    Route::get('', Dashboard::class)->name('home');

    Route::get('categories/trashed', 'CategoryController@trashed')->name('categories.trashed');
    Route::post('categories/restore/{id}', 'CategoryController@restore')->name('categories.restore');
    Route::delete('categories/force/{id}', 'CategoryController@force')->name('categories.force');
    Route::resource('categories', 'CategoryController');

    Route::get('products/trashed', 'ProductController@trashed')->name('products.trashed');
    Route::post('products/restore/{id}', 'ProductController@restore')->name('products.restore');
    Route::delete('products/force/{id}', 'ProductController@force')->name('products.force');
    Route::resource('products', 'ProductController');

    Route::get('users/trashed', 'UserController@trashed')->name('users.trashed');
    Route::post('users/restore/{id}', 'UserController@restore')->name('users.restore');
    Route::delete('users/force/{id}', 'UserController@force')->name('users.force');
    Route::resource('users', 'UserController');
});




