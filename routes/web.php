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
    return view('index');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Brand Routes
|--------------------------------------------------------------------------
*/
Route::get('brand/dashboard','BrandController@index')->name('brand');

Route::get('brand/form',function(){
  return view('brand/brandform');
})->middleware('auth')->name('brandform');

Route::post('createbrand','BrandController@createBrand')->name('createbrand');

Route::get('brand/manager/form','BrandController@managerForm')->name('managerform');

Route::post('createmanager','BrandController@createManager')->name('createmanager');


/*
|--------------------------------------------------------------------------
| Order Routes
|--------------------------------------------------------------------------
*/

Route::get('order/dashboard','OrderController@index')->name('order');