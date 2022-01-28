<?php
namespace App\Exceptions\Library;

class Auth
{
    public static function Code($code)
    {
        $maps = static::Msg();
        return $maps[$code] ?? '账号或密码错误';
    }

    public static function Msg()
    {
        return [
            '50001' => '登录成功',
            '50002' => '账号不存在',
            '50003' => '账号冻结',
            '50006' => '缺少令牌',
            '50008' => '非法登录',
            '50012' => '账号在别处登录',
            '50014' => '登录过期',
            '50015' => '退出登录成功',
            '50018' => '请输入账号信息',
            '50019' => '账号信息不存在',
            '50020' => '验证码错误',
            '50021' => '注册成功',
        ];
    }
}
