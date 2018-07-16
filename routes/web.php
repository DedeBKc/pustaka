<?php

// ======================== ROUTE YANG DAPAT DIAKSES OLEH SIAPAPUN (UNIVERSAL) ====================================
Route::group(['middleware' => ['web']], function () {

		Route::get('/', function () {
			return view('welcome');
		});


		Route::get('/contact', function () {
			return view('about');
		});

		Route::get('/buku', 'BukuController@index');
		Route::get('/buku/create', 'BukuController@create');
		Route::post('/buku', 'BukuController@store');
		Route::get('/buku/{buku}/edit', 'BukuController@edit');
		Route::get('/buku/{buku}', 'BukuController@show');
		Route::put('/buku/{buku}', 'BukuController@update');
		Route::delete('/{buku}', 'BukuController@destroy');
		
		Route::get('/caribuku','BukuController@search');

		// =================================== AdminHomeController
		Route::get('home', function() {
		    return view('home');
		});

		Route::get('pustakawan', function() {
		    $pustakawan = \App\Staff::all();
			return view('pustakawan')->with('pustakawan', $pustakawan);
		});

		Route::get('pustakawan-home', function() {
		    $pustakawan = \App\Staff::all();
			return view('pustakawan-home')->with('pustakawan', $pustakawan);
		});

});

// ======================== ROUTE YANG DAPAT DIAKSES SETELAH USER LOGIN ==============================================
	Route::get('pinjam', 'BukuController@list_pinjam');
	Route::put('user/profile/{id}', 'ListUserController@updateProfile');
	Route::get('user-profile', 'ListUserController@profile');

	Route::get('sedang_pinjam', 'BukuController@sedang_pinjam');


	// ====================================== User Authenticate


	// ================ SEMENTARA =====================
	Route::resource('/staff_user','StaffController');

	// =================================== LoginController : STAFF - ROLE
	Route::get('/staff_login',  'StaffAuth\LoginController@showLoginForm');
	Route::post('/staff_login',  'StaffAuth\LoginController@login');
	Route::post('/staff_logout', 'StaffAuth\LoginController@logout');

	// =================================== LoginController : ADMIN - ROLE
	Route::get('/admin_login',  'AdminAuth\LoginController@showLoginForm');
	Route::post('/admin_login',  'AdminAuth\LoginController@login');
	Route::post('/admin_logout', 'AdminAuth\LoginController@logout');


	// User Password reset routes
	Auth::routes();


// ======================== ROUTE YANG DAPAT DIAKSES STAFF & ADMIN =================================================
Route::group(['prefix' => 'staff',  'middleware' => 'staff_user'], function() {
	// =================================== UserController
	Route::resource('borrow', 'UserController');
	Route::get('data_pinjam', 'UserController@search');
	Route::get('create/mode-input', 'UserController@mode_input');
	Route::post('borrow/return/{$id}','UserController@return');
	Route::get('search_borrow','UserController@search_borrow');
	Route::post('new_borrow','UserController@save');
	Route::get('telat','UserController@telat');
	Route::get('search_telat','UserController@search_telat');

	Route::get('/edit_staff', 'StaffController@getEditStaff');

});

// Password reset routes
  Route::post('staff/password/email', 'StaffAuth\ForgotPasswordController@sendResetLinkEmail')->name('staff.password.email');
  Route::get('staff/password/reset', 'StaffAuth\ForgotPasswordController@showLinkRequestForm')->name('staff.password.request');
  Route::post('staff/password/reset', 'StaffAuth\ResetPasswordController@reset');
  Route::get('staff/password/reset/{token}', 'StaffAuth\ResetPasswordController@showResetForm')->name('staff.password.reset');


// ======================== ROUTE YANG DAPAT DIAKSES ADMIN ========================================================
Route::group(['prefix' => 'admin',  'middleware' => 'admin_user'], function() {

	Route::resource('user', 'ListUserController');
	Route::get('cariuser','ListUserController@search');

	Route::resource('buku','AdminBukuController');

	Route::resource('staff', 'AdminStaffController');
	Route::get('search', 'AdminStaffController@search');

	Route::resource('admin_buku','AdminBukuController');
	Route::get('caribuku','AdminBukuController@search');

});
