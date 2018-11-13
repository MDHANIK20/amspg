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
/* User Auth */
Auth::routes();
Route::get('verifyEmailFirst', 'Auth\RegisterController@VerifyEmailFirst')->name('verifyEmailFirst');
Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@SendEmailDone')->name('sendEmailDone');

Route::get('/home', 'HomeController@index')->name('home');
/* End User Auth */

/* Admin Auth */
Route::get('admin/dashboard', 'AdminController@index');

Route::get('admin', 'admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('admin','admin\LoginController@login');
Route::GET('admin/password/reset','admin\ForgotPasswordController@showLinkRequestForm' )->name('admin.password.request');
Route::POST('admin-password/email','admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::POST('admin/password/reset','admin\ResetPasswordController@reset');
Route::GET('admin/password/reset/{token}', 'admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

/* Admin URLS */

  Route::get('admin/add-location', ['as' => 'admin/add-location', 'uses' => 'AdminController@addLocation']);
  Route::POST('admin/add-location','AdminController@storeLocation')->name('admin.add-location');
  Route::get('admin/view-location','AdminController@viewLocation')->name('admin.view-location');

  Route::get('admin/add-building', ['as' => 'admin/add-building', 'uses' => 'AdminController@addBuilding']);
  Route::POST('/admin/add-building','AdminController@storeBuilding')->name('admin.add-building');
  Route::get('admin/view-building','AdminController@viewBuilding')->name('admin.view-building');

  Route::get('admin/add-manager', ['as' => 'admin/add-manager', 'uses' => 'AdminController@addManager']);
  Route::POST('admin/add-manager','AdminController@storeManager')->name('admin.add-manager');
  Route::get('admin/view-manager','AdminController@viewManager')->name('admin.view-manager');

  Route::get('manager/add-room', ['as' => 'manager/add-room', 'uses' => 'ManagerController@AddRoom']);
  Route::POST('manager/add-room','ManagerController@SaveRoom')->name('manager.AddRoom');
  Route::get('manager/view-room','ManagerController@ViewRoom')->name('manager.view-room');

  
  Route::get('manager/add-user', ['as' => 'manager/add-user', 'uses' => 'ManagerController@addUser']);
  Route::POST('manager/add-user','ManagerController@Saveuser')->name('manager.addUser');
  Route::get('manager/view-user','ManagerController@viewUser')->name('manager.view-user');


  Route::get('manager/add-rent','ManagerController@addRent')->name('manager/add-rent');
  Route::POST('manager/AddRent','ManagerController@StoreRent')->name('manager.StoreRent');
  Route::get('manager/view-rent','ManagerController@viewRent')->name('manager.view-rent');
  Route::get('manager/view-rent-receipt/{id}/edit','ManagerController@viewReceipt');
  Route::get('manager/pdfdownload/{id}','ManagerController@downloadReceipt');
  
 

  Route::match(['get','post'],'manager/getSeat','ManagerController@getSeat');
  Route::match(['get','post'],'manager/getUserDetails','ManagerController@getUserDetails');
  Route::match(['get','post'],'manager/rent-statement','ManagerController@rentStatement')->name('manager.rent-statement');
  Route::match(['get','post'],'manager/getRentStatement','ManagerController@getRentStatement');
  Route::match(['get','post'],'manager/daybook','ManagerController@daybook')->name('manager.daybook');
  Route::match(['get','post'],'manager/monthly-report','ManagerController@monthBook')->name('manager.monthsheet');

  Route::get('manager/add-expenses', ['as' => 'manager/add-expenses', 'uses' => 'ManagerController@addExpenses']);
  Route::POST('manager/add-expenses','ManagerController@saveExpenses')->name('manager.saveExpenses');



  
 
  
 
  

 






/* Manager Auth */

Route::get('manager/dashboard', 'ManagerController@index');

/*END  Admin Auth */
/* Manager Auth 
Route::get('manager/home', 'ManagerController@index');
Route::get('manager', 'manager\LoginController@showLoginForm')->name('manager.login');

Route::POST('manager','manager\LoginController@login');
Route::GET('manager/password/reset','manager\ForgotPasswordController@showLinkRequestForm' )->name('manager.password.request');
Route::POST('manager-password/email','manager\ForgotPasswordController@sendResetLinkEmail')->name('manager.password.email');
Route::POST('manager/password/reset','manager\ResetPasswordController@reset');
Route::GET('manager/password/reset/{token}', 'manager\ResetPasswordController@showResetForm')->name('manager.password.reset');
 
/*END  Manager Auth */
