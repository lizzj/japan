<?php

namespace Modules\Mall\Http\Controllers\Client\System;

use Modules\Mall\Http\Controllers\Client\ClientController;
use Modules\Mall\Repositories\Interfaces\System\ConfigRepository;

class ConfigController extends ClientController
{
    public function __construct(ConfigRepository $config)
    {
        $this->config = $config;
    }

    public function index()
    {
        $this->apiDefault(['data' => $this->config->find(1)]);
    }
}
