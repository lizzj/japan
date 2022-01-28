<?php

namespace Modules\Mall\Http\Controllers\Admin\Remind;

use App\Repositories\Interfaces\System\Remind\TencentRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\Remind\Tencent\UpdateRequest;

class TencentController extends AdminController
{
    public function __construct(TencentRepository $tencent)
    {
        $this->authId();
        $this->tencent = $tencent;
    }

    public function index()
    {
        $this->apiDefault(['data'=>$this->tencent->find(1)]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $this->apiUpdate(['data'=>$this->tencent->update($request->validated(),$id)]);
    }
}
