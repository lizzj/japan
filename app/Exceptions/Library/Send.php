<?php
namespace App\Exceptions\Library;

class Send
{
    public static function Code($code)
    {
        $maps = static::Msg();
        return $maps[$code] ?? '发送失败';
    }

    public static function Msg()
    {
        return [
            '30002' => '账号限制发送',
            '30003' => '今日短信发送条数,已达到上限',
            '30004' => '短信限制频率60秒',
            '30010' => '手机账号已注册',
            '30011' => '手机账号已绑定',
            '30012' => '手机账号尙未注册',
            '31000' => '发送成功',
        ];
    }
}
