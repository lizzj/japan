<?php

namespace Modules\Mall\Http\Controllers\Admin\System;

use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\System\Online\CreateRequest;
use Modules\Mall\Http\Requests\Admin\System\Online\UpdateRequest;
use Modules\Mall\Repositories\Interfaces\System\OnlineRepository;

class OnlineController extends AdminController
{
    public function __construct(OnlineRepository $online)
    {
        $this->authId();
        $this->online = $online;
    }

    public function index()
    {
        $this->apiDefault(['data' => $this->online->orderBy('sort', 'desc')->all()]);
    }

    public function store(CreateRequest $request)
    {
        $this->apiCreate(['data' => $this->online->create($request->validated())]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $this->apiUpdate(['data' => $this->online->update($request->validated(), $id)]);
    }

    public function destroy($id)
    {
        $this->apiDestroy(['data' => $this->online->delete($id)]);
    }
}
