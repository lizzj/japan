<?php

namespace Modules\Mall\Http\Controllers\Admin\Member\Withdrawal;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\Member\Withdrawal\Config\UpdateRequest;
use Modules\Mall\Repositories\Interfaces\Member\Withdrawal\ConfigRepository;

class ConfigController extends AdminController
{
    public function __construct(ConfigRepository $config)
    {
        $this->authId();
        $this->config = $config;
    }

    public function index()
    {
        $this->apiDefault(['data' => $this->config->find(1)]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $this->apiUpdate(['data' => $this->config->update($request->validated(), $id)]);
    }
}
