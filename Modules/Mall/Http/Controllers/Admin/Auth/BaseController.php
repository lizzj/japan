<?php

namespace Modules\Mall\Http\Controllers\Admin\Auth;

use App\Repositories\Interfaces\Auth\Mall\Admin\AdminRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\Auth\Base\InfoRequest;
use Modules\Mall\Http\Requests\Admin\Auth\Base\PasswordRequest;

class BaseController extends AdminController
{
    public function __construct(AdminRepository $admin)
    {
        $this->authId();
        $this->admin = $admin;
    }

    public function index()
    {
        $this->apiDefault(['data' => $this->admin->find($this->authId())]);
    }

    public function info(InfoRequest $request)
    {
        $data = $request->validated();
        $data['avatar'] = str_replace(config('mall.url'), '', $data['avatar']);
        $this->apiUpdate(['data' => $this->admin->update($data, $this->authId())]);
    }

    public function password(PasswordRequest $request)
    {
        $this->apiUpdate(['data' => $this->admin->changePassword($request->validated())]);
    }

    public function logout()
    {
        $this->admin->logout();
        $this->apiSpecial(20008);
    }
}
