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
Route::get('/','Auth\LoginController@loginGet');

Route::get('/login','Auth\LoginController@loginGet');
Route::post('/login','Auth\LoginController@loginPost');
Route::get('/logout','Auth\LogoutController@logoutGet');
Route::get('/register','Auth\RegisterController@registerGet');
Route::post('/register','Auth\RegisterController@registerPost');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'Home\HomeController@index');
	Route::get('/topup', 'User\UserController@topup');
	Route::post('/topup', 'User\UserController@topupPost');
	Route::get('/withdraw', 'User\UserController@withdraw');
	Route::post('/withdraw', 'User\UserController@withdrawPost');
	Route::get('/transfer', 'User\UserController@transfer');
	Route::post('/transfer', 'User\UserController@transferPost');
	Route::get('/mutasi', 'User\UserController@mutasi');
});