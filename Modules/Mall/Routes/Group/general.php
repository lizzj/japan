<?php
/**
 * @Notes:
 * @author: Je t'aime
 * @Time: 2021/11/3 14:12
 */
Route::group(['namespace' => 'General'], function () {
    //关于处理支付回调
    Route::group(['prefix' => 'notify', 'namespace' => 'Notify'], function () {
        Route::any('alipay/{token}', 'AlipayController@notify');
        Route::any('wechat/{token}', 'WechatController@notify');
    });
});
