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

     // Logo-Icon
     Route::get('/setting', 'SettingController@setting')->name('setting');
     Route::post('setting/update', 'SettingController@settingUpdate')->name('setting.update');



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
     Route::get('see/giftcard/item/{id}', 'GiftCardController@cardItems')->name('giftcard.items');
     Route::get('remove/giftcard/{id}', 'GiftCardController@remove')->name('giftcard.remove');

     //gift card items
     Route::post('giftcard/item/store/{id?}', 'GiftCardController@cardItemStore')->name('giftcard.item.store');
     Route::get('remove/giftcard/item/{id}', 'GiftCardController@cardItemRemove')->name('giftcard.item.remove');
     Route::get('/giftcard/item/codes/{id}', 'GiftCardController@cardItemCodes')->name('cardItem.code');
     Route::post('/giftcard/item/codes/store/{id?}', 'GiftCardController@codeStore')->name('code.store');
     Route::get('/giftcard/item/codes/remove/{id}', 'GiftCardController@codeRemove')->name('code.remove');

    //Category
    Route::get('/categories', 'CategoryController@categories')->name('categories');
    Route::post('/category/store/{id?}', 'CategoryController@store')->name('category.store');


         // Deposit Gateway
         Route::name('gateway.')->prefix('gateway')->group(function(){
            // Automatic Gateway
            Route::get('automatic', 'GatewayController@index')->name('automatic.index');
            Route::get('automatic/edit/{alias}', 'GatewayController@edit')->name('automatic.edit');
            Route::post('automatic/update/{code}', 'GatewayController@update')->name('automatic.update');
            Route::post('automatic/remove/{code}', 'GatewayController@remove')->name('automatic.remove');
            Route::post('automatic/activate', 'GatewayController@activate')->name('automatic.activate');
            Route::post('automatic/deactivate', 'GatewayController@deactivate')->name('automatic.deactivate');

            // Manual Methods
            Route::get('manual', 'ManualGatewayController@index')->name('manual.index');
            Route::get('manual/manual/new', 'ManualGatewayController@create')->name('manual.create');
            Route::post('manual/manual/new', 'ManualGatewayController@store')->name('manual.store');
            Route::get('manual/manual/edit/{alias}', 'ManualGatewayController@edit')->name('manual.edit');
            Route::post('manual/manual/update/{id}', 'ManualGatewayController@update')->name('manual.update');
            Route::post('manual/manual/activate', 'ManualGatewayController@activate')->name('manual.activate');
            Route::post('manual/manual/deactivate', 'ManualGatewayController@deactivate')->name('manual.deactivate');
        });


        // DEPOSIT SYSTEM
        Route::name('deposit.')->prefix('deposit')->group(function(){
            Route::get('/', 'DepositController@deposit')->name('list');
            Route::get('pending', 'DepositController@pending')->name('pending');
            Route::get('rejected', 'DepositController@rejected')->name('rejected');
            Route::get('approved', 'DepositController@approved')->name('approved');
            Route::get('successful', 'DepositController@successful')->name('successful');
            Route::get('details/{id}', 'DepositController@details')->name('details');

            Route::post('reject', 'DepositController@reject')->name('reject');
            Route::post('approve', 'DepositController@approve')->name('approve');
            Route::get('via/{method}/{type?}', 'DepositController@depViaMethod')->name('method');
            Route::get('/{scope}/search', 'DepositController@search')->name('search');
            Route::get('date-search/{scope}', 'DepositController@dateSearch')->name('dateSearch');

        });

});

