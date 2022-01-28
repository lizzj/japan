<?php
/**
 * @Notes:
 * @author: Je t'aime
 * @Time: 2021/11/3 14:12
 */
Route::group(['namespace' => 'Admin'], function () {
    /**
     * 关于登录
     */
    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::group(['prefix' => 'login'], function () {
            Route::post('account', 'LoginController@account');
            Route::post('phone', 'LoginController@phone');
        });
    });
    /**
     * 通用模块
     */
    Route::group(['prefix' => 'general', 'namespace' => 'General'], function () {
        Route::group(['prefix' => 'upload'], function () {
            Route::post('image', 'UploadController@image');
            Route::post('editor', 'UploadController@editor');
            Route::post('alipay', 'UploadController@alipay');
            Route::post('wechat', 'UploadController@wechat');
            Route::post('apk', 'UploadController@apk');
        });
        Route::group(['prefix' => 'option'], function () {
            Route::get('option', 'OptionController@option');
        });
    });
    Route::group(['middleware' => 'auth:MallAdmin'], function () {
        Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
            Route::group(['prefix' => 'base'], function () {
                Route::get('index', 'BaseController@index');
                Route::post('info', 'BaseController@info');
                Route::post('password', 'BaseController@password');
                Route::get('logout', 'BaseController@logout');
            });
        });
        Route::group(['prefix' => 'system', 'namespace' => 'System'], function () {
            Route::resource('config', 'ConfigController');
            Route::resource('version', 'VersionController');
            Route::resource('swipe', 'SwipeController');
            Route::resource('online', 'OnlineController');
            Route::resource('notice', 'NoticeController');
        });
        Route::group(['prefix' => 'payment', 'namespace' => 'Payment'], function () {
            Route::resource('alipay', 'AlipayController');
            Route::get('log/export', 'LogController@export');
            Route::resource('log', 'LogController');
            Route::resource('wechat', 'WechatController');
        });
        Route::group(['prefix' => 'remind', 'namespace' => 'Remind'], function () {
            Route::resource('aliyun', 'AliyunController');
            Route::resource('tencent', 'TencentController');
            Route::resource('log', 'LogController');
            Route::resource('config', 'ConfigController');
        });
        Route::group(['prefix' => 'article', 'namespace' => 'Article'], function () {
            Route::get('category/option', 'CategoryController@option');
            Route::resource('category', 'CategoryController');
            Route::resource('article', 'ArticleController');
        });
        Route::group(['prefix' => 'goods', 'namespace' => 'Goods'], function () {
            Route::get('category/option', 'CategoryController@option');
            Route::resource('category', 'CategoryController');
        });
        Route::group(['prefix' => 'member', 'namespace' => 'Member'], function () {
            Route::group(['prefix' => 'center', 'namespace' => 'Center'], function () {
                Route::get('level/option', 'LevelController@option');
                Route::resource('level', 'LevelController');
                Route::get('member/remote', 'MemberController@remote');
                Route::get('member/lower/{id}', 'MemberController@lower');
                Route::resource('member', 'MemberController');
            });
            Route::group(['prefix' => 'asset', 'namespace' => 'Asset'], function () {
                Route::resource('balance', 'BalanceController');
                Route::resource('commission', 'CommissionController');
            });
            Route::group(['prefix' => 'withdrawal', 'namespace' => 'Withdrawal'], function () {
                Route::resource('config', 'ConfigController');
                Route::get('type/option', 'TypeController@option');
                Route::resource('type', 'TypeController');
                Route::resource('log', 'LogController');
            });
        });
    });
});
