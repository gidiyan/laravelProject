<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
})->name('welcome');
Route::get('about', "App\Http\Controllers\AboutController@index")->name('about');
Route::resource('contact', '\App\Http\Controllers\ContactController');
Route::resource('blog', '\App\Http\Controllers\BlogController');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => '\App\Http\Controllers\Admin'], function () {

    Route::get('posts/trashed', 'PostController@trashed')->name('posts.trashed');
    Route::post('posts/restore/{id}', 'PostController@restore')->name('posts.restore');
    Route::delete('posts/force/{id}', 'PostController@force')->name('posts.force');
    Route::resource('posts', 'PostController');

    Route::get('brands/trashed', 'BrandController@trashed')->name('brands.trashed');
    Route::post('brands/restore/{id}', 'BrandController@restore')->name('brands.restore');
    Route::delete('brands/force/{id}', 'BrandController@force')->name('brands.force');
    Route::resource('brands', 'BrandController');

    Route::get('', 'Dashboard')->name('home');

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
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/shop', 'App\Http\Controllers\ShopController@index')->name('shop.index');
Route::get('/shop/product/{id}', [App\Http\Controllers\ShopController::class, 'show'])->name('shop.product');
Route::get('/shop/by_brand/{id}', [App\Http\Controllers\ShopController::class, 'getByBrand'])->name('product.by.brand');
Route::get('/shop/by_category/{id}', [App\Http\Controllers\ShopController::class, 'getByCategory'])->name('product.by.category');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
