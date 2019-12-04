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

	Route::group(['namespace'=>'admin'], function(){
	Route::group(['prefix'=>'login'], function(){
		Route::get('/', 'LoginController@getLogin');
		Route::post('/', 'LoginController@postLogin');
	});

	Route::get('logout', 'LoginController@getLogout');
	Route::get('resetpassword/{id}', 'LoginController@getResetpassword');
	Route::post('resetpassword/{id}', 'LoginController@postResetpassword');

	Route::group(['prefix'=>'admin'], function(){
		Route::get('home', 'HomeController@getHome');

		Route::group(['prefix'=>'category'], function(){
			Route::get('/', 'CategoryController@getCate');
			Route::post('/', 'CategoryController@postCate');

			Route::get('edit/{id}', 'CategoryController@getCateEdit');
			Route::post('edit/{id}', 'CategoryController@postCateEdit');

			Route::get('delete/{id}', 'CategoryController@getCateDelete');

		});


		Route::group(['prefix'=>'comment'], function(){
			Route::get('/', 'CommentController@getCom');
			Route::get('kiemduyet/{id}','CommentController@getkiemduyet');
			Route::post('kiemduyet/{id}','CommentController@postkiemduyet');
			Route::get('delete/{id}','CommentController@getdeletekiemduyet');

		});

		Route::group(['prefix'=>'slide'], function(){
			Route::get('/', 'SlideController@getSlide');

			Route::get('add', 'SlideController@getAddSlide');
			Route::post('add', 'SlideController@postAddSlide');

			Route::get('editslide/{id}', 'SlideController@geteditSlide');
			Route::post('editslide/{id}', 'SlideController@posteditSlide');

			Route::get('delete/{id}', 'SlideController@getdeleteSlide');
		});

		Route::group(['prefix'=>'user'], function(){
			Route::get('/', 'UserController@getuser');

			// Route::get('add', 'UserController@getAdduser');
			// Route::post('add', 'UserController@postAdduser');

			// Route::get('editslide/{id}', 'UserController@getedituser');
			// Route::post('editslide/{id}', 'UserController@postedituser');

			// Route::get('delete/{id}', 'UserController@getdeleteuser');
		});


		Route::group(['prefix'=>'bill'], function(){
			Route::get('/', 'BillController@getBill');

			Route::get('edit/{id}', 'BillController@getEditBill');
			Route::post('edit/{id}', 'BillController@postEditBill');

			Route::get('delete/{id}', 'BillController@getDelete');
		});

		Route::group(['prefix'=>'product'], function(){
			Route::get('/', 'ProductController@getProd');

			// Route::get('add', 'ProductController@getProd');
			Route::post('add', 'ProductController@postProdAdd')->name('addproduct');

			// Route::get('addkhuyenmai', 'ProductController@getProdAddKhuyenmai');
			// Route::post('addkhuyenmai', 'ProductController@postProdAddKhuyenmai');

			// Route::get('edit/{id}', 'ProductController@getProd');
			Route::post('editproduct/{id}', 'ProductController@postProdEdit')->name('editproduct');

			// Route::get('editkhuyenmai/{id}', 'ProductController@getProdEditKhuyenmai');
			// Route::post('editkhuyenmai/{id}', 'ProductController@postProdEditKhuyenmai');

			Route::post('/','ProductController@postProd');

			Route::get('delete/{id}', 'ProductController@getProdDelete');
		});
	});



	
		
	});



Route::get('/', function () {
    return view('welcome');
});
Route::get('index', ['as'=>'trang-chu', 'uses'=>'PageController@getIndex']);

Route::get('loai-san-pham/{type}', ['as'=>'loaisanpham', 'uses'=>'PageController@getLoaiSp']);

Route::get('chi-tiet-san-pham/{id}', ['as'=>'chitietsanpham', 'uses'=>'PageController@getChitiet']);

Route::get('lien-he', ['as'=>'lienhe', 'uses'=>'PageController@getLienHe']);

Route::get('gioi-thieu', ['as'=>'gioithieu', 'uses'=>'PageController@getGioiThieu']);

Route::get('add-to-cart/{id}', ['as'=>'themgiohang', 'uses'=>'PageController@getAddtoCart']);

Route::get('del-car/{id}', ['as'=>'xoagiohang', 'uses'=>'PageController@getDelItemCart']);

Route::post('dat-hang', ['as'=>'dathang', 'uses'=>'PageController@postCheckout']);

Route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);
Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getDatHang'
]);
Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);
Route::get('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@getSignin'
]);

Route::post('dang-ki',[
	'as'=>'signin',
	'uses'=>'PageController@postSignin'
]);
Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@postLogout'
]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);
Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);