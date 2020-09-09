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
	
    return view('web.form');
   
});
Route::post('send/mail', 'sendmail@index')->name('sendmail');

Route::resource('dataauto', 'dataauto');

Auth::routes();

Route::get('/accout', 'HomeController@index')->name('accout');

Route::group(['middleware' => "auth"] , function ()
{
	# code...
	Route::group(['prefix' => "admin" , 'namespace' => 'admin'] , function(){
		Route::get('/home' , 'admin@index')->name('admin.trangchu');
		Route::resource('/product' , 'product');
		Route::resource('/theloai' , 'theloai');
		Route::resource('/loaigiay' , 'loai_giay');

		Route::get('/tables/{data}' , 'tables@show')->name('admin.tables');
		Route::get('/add_banner' , 'create_banner@index');
		// Route::get('/add_product' , '');
		// Route::get('/add_product' , '');
		Route::get('/xoa/{id}' , 'product@destroy');

		Route::get('/sua/{id}' , 'product@edit');
		Route::post('/sua/{id}', 'product@update');

		Route::post('add_product', "product@store" );
		Route::post('add_theloai', "theloai@store" );
		Route::post('add_loaigiay', "loai_giay@store" );
	});
});


Route::group(['namespace' => 'clients'], function(){
		Route::get('/home', 'show_product@show_index');
		Route::get('theloai/{theloai}/{loaigiay?}', 'show_product@show_loaigiay')->where(['theloai' => '[a-zA-Z]+' , 'loaigiay' => '[a-zA-Z]+']);
		Route::get('/product_detail/{id}' , 'show_product@show_details');
		route::get('about' , function(){
			return view('web.about');
		});
		route::get('contact' , function(){
			return view('web.contact');
		});
		route::post('search', 'show_product@search');


		route::post('cart/add/', 'addcart@index');
		route::get('cart/getcart', 'addcart@getcart');
		route::post('cart/remove', 'addcart@removecart');
		route::post('cart/update', 'addcart@update');

		route::get('cart/checkout' , 'order_product@index');
		route::post('cart/order_complete', 'order_product@checkOut');
		// Route::get('/women', '');
		// Route::get('/contact', '');
		// Route::get('/product-detail', 'product');
		// Route::get('/checkout', '');
		// Route::get('/cart', '');
		// Route::get('/add-to-wishlist', '');
		// Route::get('/order-complete', '');
		});
route::get('test/test/test', function(){
			return view('web.test');
		});





