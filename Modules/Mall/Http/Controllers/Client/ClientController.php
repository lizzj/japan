<?php

namespace Modules\Mall\Http\Controllers\Client;

use App\Exceptions\Exception\BaseException;
use App\Repositories\Interfaces\Auth\User\UserRepository;
use Illuminate\Routing\Controller;

class ClientController extends Controller
{
    protected function exception($result)
    {
        throw new BaseException('success', $result);
    }

    protected function Error($code)
    {
        throw new BaseException('valid', ['data' => null, 'code' => $code]);
    }

    //抛出返回--默认
    public function apiDefault($data = null)
    {
        $this->exception([$data, 'code' => 20000]);
    }

    //抛出返回--创建
    public function apiCreate($data = null)
    {
        $data == true ? $data = null : $data;
        $this->exception(['data' => $data, 'code' => 20001]);
    }

    //抛出返回--修改
    public function apiUpdate($data = null)
    {
        $this->exception(['data' => null, 'code' => 20002]);
    }

    //抛出返回--删除
    public function apiDestroy($data = null)
    {
        $this->exception(['data' => null, 'code' => 20003]);
    }

    //抛出返回--特殊
    public function apiSpecial($code)
    {
        $this->exception(['data' => null, 'code' => $code]);
    }

    //抛出返回--Option
    public function apiOption($data)
    {
        $this->exception(['data' => ArrayObject($data['data']), 'code' => 20000]);
    }

    public function authInfo()
    {
        return \Auth::guard('Client')->user();
    }

    public function authId()
    {
        if (\Auth::guard('Client')->user() === null) {
            throw new BaseException('login', ['data' => null, 'code' => 50014]);
        }
        $repository = app(UserRepository::class);
        if ($code = $repository->verifyAuth(\request())) {
            throw new BaseException('login', ['data' => null, 'code' => $code]);
        }
        return \Auth::guard('Client')->user()->getAuthIdentifier();
    }

    public function authPhone()
    {
        return \Auth::guard('Client')->user()->getPhone();
    }

    public function authRoles()
    {
        return \Auth::guard('Client')->user()->getAgent();
    }

    public function authLevel()
    {
        return \Auth::guard('Client')->user()->getLevel();
    }
}
