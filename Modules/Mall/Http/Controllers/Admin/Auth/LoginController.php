<?php

namespace Modules\Mall\Http\Controllers\Admin\Auth;

use App\Exceptions\Exception\BaseException;
use App\Repositories\Interfaces\Auth\Mall\Admin\AdminRepository;
use Auth;
use Carbon\Carbon;
use Illuminate\Routing\Controller;
use Modules\Mall\Http\Requests\Admin\Auth\Login\AccountRequest;

class LoginController extends Controller
{
    private AdminRepository $admin;

    public function __construct(AdminRepository $admin)
    {
        $this->admin = $admin;
    }

    protected function Exception($result = null)
    {
        throw new BaseException('login', $result);
    }

    protected function Success($data)
    {
        $this->Exception(['data' => $data, 'code' => 50001]);
    }

    protected function Error($code)
    {
        $this->Exception(['data' => null, 'code' => $code]);
    }

    /**
     * @param $data
     * @return bool
     * @Notes:验证登录
     * @author: Je t'aime
     * @Time: 2021/7/210:26
     */
    protected function verifyAttempt($data)
    {
        //默认的data account和 password
        if ($token = auth('MallAdmin')->attempt($data, ['exp' => Carbon::now()->addDays(15)->timestamp])) {
            Auth::guard('MallAdmin')->user()->setRememberToken($token);
            $this->admin->update(['remember_token' => $token, 'last_login' => time()], Auth::guard('MallAdmin')->user()->getAuthIdentifier());
            return $token;
        }
        return false;
    }

    /**
     * @param $token
     * @return array
     * @Notes:定义返回格式
     * @author: Je t'aime
     * @Time: 2021/7/210:26
     */
    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('MallAdmin')->factory()->getTTL() * 600
        ];
    }

    public function account(AccountRequest $request)
    {
        $data = $request->validated();
        //先判断账号存在
        if ($this->admin->VerifyAccount($data['account'])) {
            $this->Error(50002);
        }
        //然后回调生成token
        if ($token = $this->verifyAttempt($data)) {
            $this->respondWithToken($token);
            $this->Success($this->respondWithToken($token));
        } else {
            $this->Error(50010);
        }
    }

    public function find(AccountRequest $request)
    {
        $data = $request->validated();
        //先判断账号存在
        if ($this->admin->VerifyAccount($data['account'])) {
            $this->Error(50002);
        }
        //然后回调生成token
        if ($token = $this->verifyAttempt($data)) {
            $this->respondWithToken($token);
            $this->Success($this->respondWithToken($token));
        } else {
            $this->Error(50010);
        }
    }
}
