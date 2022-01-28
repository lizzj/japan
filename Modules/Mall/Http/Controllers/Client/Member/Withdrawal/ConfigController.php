<?php

namespace Modules\Mall\Http\Controllers\Client\Member\Withdrawal;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Mall\Http\Controllers\Client\ClientController;
use Modules\Mall\Repositories\Interfaces\Member\Withdrawal\ConfigRepository;

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
