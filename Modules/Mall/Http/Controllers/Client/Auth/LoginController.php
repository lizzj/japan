<?php

namespace Modules\Mall\Http\Controllers\Client\Auth;

use App\Exceptions\Exception\BaseException;
use App\Repositories\Interfaces\Auth\User\UserRepository;
use App\Repositories\Interfaces\System\Sms\LogRepository;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Modules\Mall\Http\Requests\Client\Auth\Login\AccountRequest;
use Modules\Mall\Http\Requests\Client\Auth\Login\FindRequest;
use Modules\Mall\Http\Requests\Client\Auth\Login\PhoneRequest;
use Modules\Mall\Http\Requests\Client\Auth\Login\RegisterRequest;

class LoginController extends Controller
{
    public function __construct(UserRepository $user, LogRepository $log)
    {
        $this->user = $user;
        $this->log = $log;
    }

    protected function Exception($result = null)
    {
        throw new BaseException('login', $result);
    }

    protected function Success($data)
    {
        $this->Exception(['data' => $data, 'code' => 50001]);
    }

    protected function Special($code)
    {
        $this->Exception(['data' => null, 'code' => $code]);
    }

    protected function Error($code)
    {
        $this->Exception(['data' => null, 'code' => $code]);
    }

    protected function verifyAttempt($data)
    {
        //默认的data account和 password
        if ($token = auth('Client')->attempt($data, ['exp' => Carbon::now()->addDays(15)->timestamp])) {
            Auth::guard('Client')->user()->setRememberToken($token);
            $this->user->update(['remember_token' => $token, 'last_login' => time()], Auth::guard('Client')->user()->getAuthIdentifier());
            return $token;
        }
        return false;
    }

    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('Client')->factory()->getTTL() * 600
        ];
    }

    public function account(AccountRequest $request)
    {
        $data = $request->validated();
        if ($token = $this->verifyAttempt($data)) {
            $this->Success($this->respondWithToken($token));
        } else {
            $this->Error(50010);
        }
    }

    public function phone(PhoneRequest $request)
    {
        $data = $request->validated();
        if ($this->log->verifyCode($data['phone'], $data['code'], 'login')) {
            $this->Error(50020);
        }
        //然后根据手机号获取第一个信息
        $userInfo = $this->user->findWhere(['phone' => $data['phone'], 'status' => 'on'])['data'];
        if (count($userInfo) > 0) {
            $loginData = [
                'account' => $userInfo[0]['account'],
                'password' => $userInfo[0]['original'],
            ];
            $token = $this->verifyAttempt($loginData);
            $this->Success($this->respondWithToken($token));
        } else {
            $this->Error(50019);
        }
    }

    public function find(FindRequest $request)
    {
        $data = $request->validated();
        //需要验证手机号码和code是否存在
        if ($this->log->verifyCode($data['phone'], $data['code'], 'find')) {
            $this->Error(50020);
        }
        $aime = $this->user->findWhere(['phone' => $data['phone']])['data'];
        if (count($aime) > 0) {
            if ($this->user->changePassword($data['password'], $aime[0]['id'])) {
                $attempt = [
                    'account' => $aime[0]['account'],
                    'password' => $data['password'],
                ];
                if ($token = $this->verifyAttempt($attempt)) {
                    $this->Success($this->respondWithToken($token));
                }
            }
        }
        $this->Error(50010);
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        if ($this->log->verifyCode($data['phone'], $data['code'], 'register')) {
            $this->Error(50020);
        }
        $data['account'] = $data['phone'];
        $this->user->register($data);
        $this->Special(50021);
    }
}
