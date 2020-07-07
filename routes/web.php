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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Route as RouteAlias;

RouteAlias::get('/main', 'MainController@index');

RouteAlias::get('/','MainController@index');

RouteAlias::view('/news','news');

RouteAlias::view('/events','events');

RouteAlias::view('/proDance','proDance');

RouteAlias::view('/masterClasses','masterClasses');

RouteAlias::view('/inventory','inventory');

RouteAlias::view('/forum','forum');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

#Admin groups routs
//Route::get('/admin','Admin\\AdminController@index')->name('admin.home');
Route::resource('admin/users', 'Admin\\UsersController');
//Route::resource('/admin/roles', 'Admin\\RolesController');
//Route::resource('/admin/permissions', 'Admin\\PermissionsController');
//Route::resource('/admin/settings', 'Admin\\SettingsController');
//Route::resource('/admin/pages', 'Admin\PagesController');
//Route::resource('/admin/activitylogs','Admin\\ActivityLogsController');
//Route::resource('/admin/roles', 'Admin\\RolesController');
Route::resource('admin/schools', 'Admin\\SchoolsController');
#End Admin



//Route::namespace('Auth')->group(function(){
//    //Login Routes
//    Route::get('/login','LoginController@showLoginForm')->name('login');
//    Route::post('/login','LoginController@login');
//    Route::post('/','HomeController@index')->name('logout');
//    //Forgot Password Routes
//    Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
//    Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//    //Reset Password Routes
//    Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
//    Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
//});


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});


Route::get('/admin/userToSchool','UsersToSchoolController@index');

