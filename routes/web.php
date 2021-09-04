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

});

Auth::routes();


Route::get('/paymemt/percost/pdf', 'PaymentController@pdf_percost');
Route::get('/home', 'ProductController@index')->name('home');
Route::get('/admin/users/profile','UserController@profile');
Route::get('admin/users/{id}','UserController@edit');
Route::middleware(['auth', 'role:admin,guest'])->group(function () {
Route::resource('contact','ContactController');

Route::resource('payment/create?order_id={order_id}', 'PaymentController');


Route::get('/example/pdf', 'PaymentController@pdf_index');
Route::resource('productattribute', 'ProductAttributeController');

});


Route::middleware(['auth', 'role:admin,guest'])->group(function () {
    Route::get('/admin/dashboard', 'DashboardController@dashboard');
    
});
Route::resource('payment', 'PaymentController');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/payment','PaymentController@payment');
    Route::get('admin/user','DashboardController@user');
    
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->group(function () {    
       
    });
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    
    Route::resource('/users' , 'UserController' );
    
   
});
Route::resource('order', 'OrderController');
Route::resource('product-attribute', 'ProductAttributeController');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->group(function () {    
        Route::get('order-product/reportdaily', 'OrderProductController@reportdaily');
        Route::get('order-product/reportmonthly', 'OrderProductController@reportmonthly');
        Route::get('order-product/reportyearly', 'OrderProductController@reportyearly');
        Route::get('/stock', 'ProductController@stock');
    });
    
    Route::resource('order-product', 'OrderProductController');
    Route::resource('order', 'OrderController');
    Route::resource('payment', 'PaymentController');
    Route::resource('product', 'ProductController');
});

