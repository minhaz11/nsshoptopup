<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'SiteController@index')->name('home');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/code-verify', 'Auth\ForgotPasswordController@codeVerify')->name('password.code_verify');

Route::get('password/reset/{token}', 'Auth\PasswordResetController@showResetForm')->name('password.reset');
Route::post('password/verify-code', 'Auth\ForgotPasswordController@verifyCode')->name('password.verify-code');
Route::post('password/update', 'Auth\PasswordResetController@reset')->name('password.update');




Route::get('/item/{slug}/{id}', 'GameController@itemDetails')->name('item.view');

Route::get('all/top-up/item/', 'GameController@topUpitem')->name('item.topUp');
Route::get('all/giftcard/item/', 'GameController@giftcardItem')->name('item.giftcard');

Route::post('/item/order', 'GameController@itemOrder')->name('item.order');
Route::get('/payment', 'GameController@payment')->name('payment');
Route::get('/items/giftcard/{slug}/{id}', 'GameController@giftcardItems')->name('cardItems');
Route::get('/giftcard/item/{slug}/{id}', 'GameController@cardItemPurchase')->name('cardItem.purchase');
Route::post('/giftcard/item/purchase/{id}', 'GameController@cardItemOrder')->name('cardItem.order');


//payment

Route::namespace('Gateway')->prefix('ipn')->name('ipn.')->group(function () {
    Route::post('paypal', 'paypal\ProcessController@ipn')->name('paypal');
    Route::get('paypal_sdk', 'paypal_sdk\ProcessController@ipn')->name('paypal_sdk');
    Route::post('perfect_money', 'perfect_money\ProcessController@ipn')->name('perfect_money');
    Route::post('stripe', 'stripe\ProcessController@ipn')->name('stripe');
    Route::post('stripe_js', 'stripe_js\ProcessController@ipn')->name('stripe_js');
    Route::post('stripe_v3', 'stripe_v3\ProcessController@ipn')->name('stripe_v3');
    Route::post('skrill', 'skrill\ProcessController@ipn')->name('skrill');
    Route::post('paytm', 'paytm\ProcessController@ipn')->name('paytm');
    Route::post('payeer', 'payeer\ProcessController@ipn')->name('payeer');
    Route::post('paystack', 'paystack\ProcessController@ipn')->name('paystack');
    Route::post('voguepay', 'voguepay\ProcessController@ipn')->name('voguepay');
    Route::get('flutterwave/{trx}/{type}', 'flutterwave\ProcessController@ipn')->name('flutterwave');
    Route::post('razorpay', 'razorpay\ProcessController@ipn')->name('razorpay');
    Route::post('instamojo', 'instamojo\ProcessController@ipn')->name('instamojo');
    Route::get('blockchain', 'blockchain\ProcessController@ipn')->name('blockchain');
    Route::get('blockio', 'blockio\ProcessController@ipn')->name('blockio');
    Route::post('coinpayments', 'coinpayments\ProcessController@ipn')->name('coinpayments');
    Route::post('coinpayments_fiat', 'coinpayments_fiat\ProcessController@ipn')->name('coinpayments_fiat');
    Route::post('coingate', 'coingate\ProcessController@ipn')->name('coingate');
    Route::post('coinbase_commerce', 'coinbase_commerce\ProcessController@ipn')->name('coinbase_commerce');
    Route::get('mollie', 'mollie\ProcessController@ipn')->name('mollie');
    Route::post('cashmaal', 'cashmaal\ProcessController@ipn')->name('cashmaal');
});

  // Deposit
  Route::middleware('auth')->group(function () {
    Route::any('/deposit', 'Gateway\PaymentController@deposit')->name('deposit');
    Route::post('deposit/insert', 'Gateway\PaymentController@depositInsert')->name('deposit.insert');
    Route::get('deposit/preview', 'Gateway\PaymentController@depositPreview')->name('deposit.preview');
    Route::get('deposit/confirm', 'Gateway\PaymentController@depositConfirm')->name('deposit.confirm');
    Route::get('deposit/manual', 'Gateway\PaymentController@manualDepositConfirm')->name('deposit.manual.confirm');
    Route::post('deposit/manual', 'Gateway\PaymentController@manualDepositUpdate')->name('deposit.manual.update');
    Route::get('deposit/history', 'UserController@depositHistory')->name('deposit.history');
  });



