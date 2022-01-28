<?php

namespace Modules\Mall\Http\Controllers\Admin\Remind;

use App\Repositories\Interfaces\System\Remind\AliyunRepository;
use App\Repositories\Interfaces\System\Remind\ConfigRepository;
use App\Repositories\Interfaces\System\Remind\TencentRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\Remind\Config\UpdateRequest;

class ConfigController extends AdminController
{
    public function __construct(ConfigRepository $config, AliyunRepository $aliyun, TencentRepository $tencent)
    {
        $this->authId();
        $this->config = $config;
        $this->aliyun = $aliyun;
        $this->tencent = $tencent;
    }

    public function index()
    {
        $this->apiDefault(['data' => $this->config->find(1)]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        if ($data['status'] === 'on') {
            //验证默认是否开启
            if ($this->verifyOpen($data['default'])){
                $this->Error(60016);
            }
        }
        $this->apiUpdate(['data'=>$this->config->update($data,$id)]);
    }

    public function verifyOpen($default)
    {
        if ($default === 'aliyun') {
            return $this->aliyun->verifyStatus();
        } else {
            return $this->tencent->verifyStatus();
        }
    }
}
