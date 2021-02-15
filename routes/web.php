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

Route::get('/', 'SiteController@index')->name('home');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('reset.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('reset.form');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('reset');


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/item/{slug}/{id}', 'GameController@itemDetails')->name('item.view');
Route::post('/item/order', 'GameController@itemOrder')->name('item.order');
Route::get('/payment', 'GameController@payment')->name('payment');
Route::get('/items/giftcard/{slug}/{id}', 'GameController@giftcardItems')->name('cardItems');


