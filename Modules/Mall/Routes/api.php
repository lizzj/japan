<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['domain' => config('domain.Mall')], function () {
    Route::prefix('admin')->group(__DIR__ . '/Group/admin.php');//总后台api
    Route::prefix('client')->group(__DIR__ . '/Group/client.php');//客户端api
    Route::prefix('general')->group(__DIR__ . '/Group/general.php');//通用异步回调api
});
