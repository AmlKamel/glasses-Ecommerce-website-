<?php

use App\Http\Middleware\access;
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



//Route::get('user/register','Client@show')->name('user_register');

//Route::post('user/add','Client@add')->name('add_user');

/*project*/

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


//product page 
Route::get('all/products/all','productController@showtoall')->name('all');




/*show all details about product */
Route::get('details/{id}','productController@details')->name('details');
 


//Cart
//Route::post('user/products/addToCart','cartController@addToCart')->name('cart');
Route::get('/store/{product}' ,'cartController@store')->name('cart.store')->middleware('auth');

Route::any('/show' ,'cartController@show')->name('cart.show')->middleware('auth');

Route::post('/edit/{id}','cartController@edit')->name('edit_quantity')->middleware('auth');

Route::get('/delete/{id}','cartController@delete')->name('delete_cart_prod')->middleware('auth');





//admin
Route::get('admin/products/all','productController@show')->name('admin')->middleware('admin');


Route::post('admin/products/add','productController@add')->name('add_prod')->middleware('admin');


Route::post('admin/products/edit/{id}','productController@edit')->name('edit_prod')->middleware('admin');


Route::get('admin/products/delete/{id}','productController@delete')->name('delete_prod')->middleware('admin');




//user
Route::get('user/products/all','productController@showtouser')->name('user')->middleware('auth');

//Route::get('user/products/all2','productController@showtouser2')->name('user');























Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
