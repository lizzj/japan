<?php

namespace Modules\Mall\Http\Controllers\Admin\Remind;

use App\Repositories\Interfaces\System\Remind\AliyunRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\Remind\Aliyun\UpdateRequest;

class AliyunController extends AdminController
{
    public function __construct(AliyunRepository $aliyun)
    {
        $this->authId();
        $this->aliyun = $aliyun;
    }

    public function index()
    {
        $this->apiDefault(['data'=>$this->aliyun->find(1)]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $this->apiUpdate(['data'=>$this->aliyun->update($request->validated(),$id)]);
    }
}
