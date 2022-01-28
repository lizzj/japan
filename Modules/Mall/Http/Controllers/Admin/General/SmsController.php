<?php

namespace Modules\Mall\Http\Controllers\Admin\General;

use App\Exceptions\Exception\BaseException;
use App\Repositories\Interfaces\Auth\Mall\Admin\AdminRepository;
use App\Repositories\Interfaces\System\Sms\LogRepository;
use Illuminate\Routing\Controller;
use Modules\Mall\Http\Requests\Client\General\Sms\SendRequest;

class SmsController extends Controller
{
    public function __construct(LogRepository $log, AdminRepository $user)
    {
        $this->log = $log;
        $this->user = $user;
    }

    public function Result($code)
    {
        throw new BaseException('send', ['data' => null, 'code' => $code]);
    }

    public function send(SendRequest $request)
    {
        $data = $request->validated();
        //先根据类型来判断,如果是登录,首先要判断手机号码是否存在
        if ($data['type'] === 'login' || $data['type'] === 'find') {
            if (!$this->user->verifyPhone($data['phone'])) {
                $this->Result(30012);
            }
        }
        $data['modules'] = config('mall.lowerName');
        $this->Result($this->log->handleSend($data));
    }
}
