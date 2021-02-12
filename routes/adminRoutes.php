<?php

use Illuminate\Support\Facades\Route;


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->group(function () {
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login')->name('login');
        Route::get('logout', 'LoginController@logout')->name('logout');

        //register
        Route::get('/register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('/register', 'RegisterController@register')->name('register');
        // Admin Password Reset
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('password/reset', 'ForgotPasswordController@sendResetLinkEmail');
        Route::post('password/verify-code', 'ForgotPasswordController@verifyCode')->name('password.verify-code');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.change-link');
        Route::post('password/reset/change', 'ResetPasswordController@reset')->name('password.change');
    });

    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');

    //subscription
    Route::get('/subscriptions', 'SubscriptionController@all')->name('subscription');
    Route::post('/subscriptions/store', 'SubscriptionController@store')->name('subscription.store');
    Route::post('/subscriptions/update/{id}', 'SubscriptionController@store')->name('subscription.update');

    //Frontend manage routes
    Route::get('/banners', 'FrontendController@banners')->name('banners');
    Route::get('/banner/create', 'FrontendController@bannerCreate')->name('banner.create');
    Route::post('/banner/store', 'FrontendController@bannerStore')->name('banner.store');
    Route::get('/banner/edit/{id}', 'FrontendController@bannerEdit')->name('banner.edit');
    Route::post('/banner/update/{id}', 'FrontendController@bannerStore')->name('banner.update');
    Route::post('/banner/remove/{id}', 'FrontendController@bannerRemove')->name('banner.remove');

    //items
    Route::get('/items', 'ItemController@items')->name('items');
    Route::get('/item/add', 'ItemController@itemAdd')->name('item.add');
    Route::put('/item/Store', 'ItemController@itemStore')->name('item.store');
    Route::get('/item/edit/{id}', 'ItemController@itemEdit')->name('item.edit');
    Route::put('/item/update/{id}', 'ItemController@itemStore')->name('item.update');
    Route::get('/item/remove/{id}', 'ItemController@itemRemove')->name('item.remove');

    //item types
    Route::get('/item/types', 'ItemTypeController@itemTypes')->name('type');
    Route::get('/add/item/types', 'ItemTypeController@addItemTypes')->name('type.add');
    Route::put('/store/item/types/{id?}', 'ItemTypeController@store')->name('type.store');
    Route::get('/edit/item/types/{id}', 'ItemTypeController@edit')->name('type.edit');
    Route::get('/remove/item/types/{id}', 'ItemTypeController@remove')->name('type.remove');

    //package
     Route::get('/item/packages', 'PackageController@packages')->name('package');
     Route::get('/add/item/package', 'PackageController@addItemPackage')->name('package.add');
     Route::post('/store/item/package/{id?}', 'PackageController@store')->name('package.store');
     Route::get('/edit/item/package/{id}', 'PackageController@edit')->name('package.edit');
     Route::get('/remove/item/package/{id}', 'PackageController@remove')->name('package.remove');

     //gift card
     Route::get('/giftcard', 'GiftCardController@giftcards')->name('giftcard');
     Route::post('store/giftcard/{id?}', 'GiftCardController@store')->name('giftcard.store');

    //Category
    Route::get('/categories', 'CategoryController@categories')->name('categories');
    Route::post('/category/store/{id?}', 'CategoryController@store')->name('category.store');

});

