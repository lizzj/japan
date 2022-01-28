<?php

namespace Modules\Mall\Http\Controllers\Client\Auth;

use App\Repositories\Interfaces\Auth\User\UserRepository;
use Illuminate\Support\Facades\File;
use Modules\Mall\Http\Controllers\Client\ClientController;
use Modules\Mall\Http\Requests\Client\Auth\Base\InfoRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BaseController extends ClientController
{
    public function __construct(UserRepository $user)
    {
        $this->authId();
        $this->user = $user;
    }

    public function index()
    {
        $this->apiDefault(['data' => $this->user->find($this->authId())]);
    }

    public function info(InfoRequest $request)
    {
        $data = $request->validated();
        $data['avatar'] = str_replace(config('mall.url'), '', $data['avatar']);
        $this->apiUpdate(['data' => $this->user->update($data, $this->authId())]);
    }

    public function qrcode()
    {
        //先获取这个用户的信息--如果用户的level_id为1则需要购买后才能分享
        if ($this->authInfo()->name === null) {
            $this->Error(61009);
        }
        //查看头像文件在不在,如果不在需要默认一个
        $folder = config('mall.create_path') . '/QrCodes/';
        File::isDirectory($folder) or File::makeDirectory($folder, 0777, true, true);
        $codePath = $folder . $this->authInfo()->id . '.png';
        $link = config('mall.url') . 'register?token=' . $this->authInfo()->token;
        if ($this->authInfo()->avatar === null) {
            $merge = config('mall.url') . '/Default/Avatar/default.jpg';
        } else {
            $merge = config('mall.url') . $this->authInfo()->avatar;
        }
        QrCode::format('png')->errorCorrection('H')->size(200)->margin(1.5)->gradient(1, 2, 3, 4, 5, 6, 'radial')->encoding('UTF-8')->merge($merge, .3, true)->generate($link, public_path($codePath));
        $this->apiDefault(['data' => config('mall.url') . $codePath]);
    }

    public function lower()
    {
        $this->apiDefault(['data' => $this->user->findByField('pid', $this->authId())]);
    }

    public function logout()
    {
        if ($this->user->logout()) {
            $this->apiSpecial(20008);
        }
    }
}
