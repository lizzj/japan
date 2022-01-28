<?php
namespace App\Exceptions\Library;

class Error
{
    public static function errMsg($code)
    {
        $msg = static::getErrs();
        $codes = static::getCodes();
        return [
            'msg'=> $msg[$code] ?? '未知错误',
            'code'=> $codes[$code] ?? 40001,
        ];
    }

    public static function getErrs(): array
    {
        return [
            'QueryException' => 'Sql查询错误',
            'ModelNotFoundException'=>'Model数据不存在',
            'NotFoundHttpException'=>'Api接口不存在',
            'BindingResolutionException'=>'系统错误',
            'ParameterException'=>'参数错误'
        ];
    }
    public static function getCodes(): array
    {
        return [
            'QueryException' => 40002,
            'ModelNotFoundException'=>40003,
            'NotFoundHttpException'=>40004,
            'BindingResolutionException'=>40001,
            'ParameterException'=>40005
        ];
    }
}
