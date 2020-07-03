<?php

use Illuminate\Support\Facades\Auth;
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

Route::resource('category', 'CategoryController');/*only with log*/

Route::resource('employee', 'EmployeeController');

Route::resource('product', 'ProductController');

Route::get('/','ProductController@listProduct');/*  '/' empty get u to local 8000 main url access by icon App name(laravel) up left*/

Route::get('/products/{id}', 'ProductController@view')->name('product.detail');
/*is the view function in controller name=product.detail is coming from return the info button by product/list*/

Route::resource('brand', 'BrandController');

Route::resource('customer', 'CustomerController');

Route::resource('payment', 'PaymentController');

Route::resource('order', 'OrderController');

//Route::get('category/create', 'CategoryController@create');

Route::get('/home', 'HomeController@index')->name('home');
