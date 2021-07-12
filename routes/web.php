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
Route::middleware(['auth', 'role:admin,guest'])->group(function () {
Route::resource('contact','ContactController');
Route::resource('product', 'ProductController');
Route::resource('payment/create?order_id={order_id}', 'PaymentController');
Route::resource('order', 'OrderController');
Route::resource('order-product', 'OrderProductController');
Route::get('/example/pdf', 'PaymentController@pdf_index');



});
Route::middleware(['auth', 'role:admin,guest'])->group(function () {
   
    
});
Route::resource('payment', 'PaymentController');

Route::middleware(['auth', 'role:admin'])->group(function () {

});



Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    
    Route::resource('/users' , 'UserController' );
   
});