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

// Route::get('/',function(){
// 	return view('welcome'); 
// });
Route::match(['get','post'],'/','App\Http\Controllers\IndexController@index');
Route::match(['get','post'],'/admin','App\Http\Controllers\AdminController@login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware'=>['auth']],function(){


Route::match(['get','post'],'/admin/dashboard','App\Http\Controllers\AdminController@dashboard')->name('admin.dashboard');
// Category route
Route::match(['get','post'],'/admin/add-category','App\Http\Controllers\CategoryController@addCategory')->name('admin.add-category');
// Product route
Route::match(['get','post'],'/admin/add-product','App\Http\Controllers\ProductsController@addProduct')->name('admin.add-product');
Route::match(['get','post'],'/admin/view-products','App\Http\Controllers\ProductsController@viewProducts')->name('admin.view-products');
Route::match(['get','post'],'/admin/edit-product/{id}','App\Http\Controllers\ProductsController@editProduct')->name('admin.edit-product');
Route::match(['get','post'],'/admin/delete-product/{id}','App\Http\Controllers\ProductsController@deleteProduct')->name('admin.delete-product');

});
Route::get('/logout','App\Http\Controllers\AdminController@logout')->name('logout');
	



