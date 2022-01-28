<?php

namespace Modules\Mall\Http\Controllers\Admin\System;

use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\System\Config\UpdateRequest;
use Modules\Mall\Repositories\Interfaces\System\ConfigRepository;

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

    public function update(UpdateRequest $request)
    {
        $data = $request->validated();
        $data['logo'] = str_replace(config('mall.url'), '', $data['logo']);
        $data['service_qrcode'] = str_replace(config('mall.url'), '', $data['service_qrcode']);
        $this->apiUpdate(['data' => $this->config->update($data, 1)]);
    }
}
