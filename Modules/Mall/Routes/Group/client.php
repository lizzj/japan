<?php
Route::group(['namespace' => 'Client'], function () {
    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::group(['prefix' => 'login'], function () {
            Route::post('account', 'LoginController@account');
            Route::post('phone', 'LoginController@phone');
            Route::post('register', 'LoginController@register');
            Route::post('find', 'LoginController@find');
        });
    });
    Route::group(['prefix' => 'general', 'namespace' => 'General'], function () {
        Route::group(['prefix' => 'sms'], function () {
            Route::post('send', 'SmsController@send');
        });
        Route::group(['prefix' => 'upload'], function () {
            Route::post('image', 'UploadController@image');
        });
        Route::group(['prefix' => 'option'], function () {
            Route::get('option', 'OptionController@option');
        });
    });
    Route::group(['prefix' => 'system', 'namespace' => 'System'], function () {
        Route::resource('config', 'ConfigController');
        Route::resource('version', 'VersionController');
        Route::resource('online', 'OnlineController');
        Route::resource('swipe', 'SwipeController');
    });
    Route::group(['middleware' => 'auth:Client'], function () {
        Route::group(['prefix' => 'auth', 'namespace' => 'Auth', 'middleware' => 'mallClientVersion'], function () {
            Route::group(['prefix' => 'base'], function () {
                Route::get('index', 'BaseController@index');
                Route::get('qrcode', 'BaseController@qrcode');
                Route::get('lower', 'BaseController@lower');
                Route::post('info', 'BaseController@info');
                Route::get('logout', 'BaseController@logout');
            });
        });
        Route::group(['prefix' => 'member', 'namespace' => 'Member'], function () {
            Route::group(['prefix' => 'asset', 'namespace' => 'Asset'], function () {
                Route::resource('balance', 'BalanceController');
                Route::resource('commission', 'CommissionController');
            });
            Route::group(['prefix' => 'center', 'namespace' => 'Center'], function () {
                Route::post('level/payment', 'LevelController@payment');
                Route::resource('level', 'LevelController');
            });
            Route::group(['prefix' => 'base', 'namespace' => 'Base'], function () {
                Route::resource('address', 'AddressController');
            });
            Route::group(['prefix' => 'withdrawal', 'namespace' => 'Withdrawal'], function () {
                Route::resource('config', 'ConfigController');
                Route::resource('type', 'TypeController');
                Route::get('log/history', 'LogController@history');
                Route::resource('log', 'LogController');
            });
        });
    });
});
