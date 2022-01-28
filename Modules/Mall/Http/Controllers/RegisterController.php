<?php

namespace Modules\Mall\Http\Controllers;

use App\Models\Auth\User\User;
use Illuminate\Routing\Controller;
use Modules\Mall\Entities\Article\Article;
use Modules\Mall\Entities\System\Config;
use Modules\Mall\Entities\System\Version;

class RegisterController extends Controller
{
    public function register()
    {
        $token = \request()->token;
        if ($token === null) {
            abort(404);
        }
        //根据token来获取用户的信息.如果用户的信息不存在直接返回404
        $userInfo = User::where(['token' => $token])->first();
        if ($userInfo === null) {
            abort(404);
        }
        //获取系统信息--logo
        $configInfo = Config::find(1);
        //用户注册协议
        $articleInfo = Article::find(1);
        return view('mall::Register.register', ['userInfo' => $userInfo, 'configInfo' => $configInfo, 'articleInfo' => $articleInfo]);
    }

    public function download()
    {
        //获取当前的最新版本
        $versionInfo = Version::where(['status' => 'on', 'release' => 'yes'])->latest()->first();

        $size = round(\File::size('.' . $versionInfo->url) / 1024 / 1024, 2);
        $configInfo = Config::find(1);
        return view('mall::Register.download', ['versionInfo' => $versionInfo, 'size' => $size, 'configInfo' => $configInfo]);
    }
    
}
