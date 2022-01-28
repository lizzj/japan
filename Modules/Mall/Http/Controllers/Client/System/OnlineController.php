<?php

namespace Modules\Mall\Http\Controllers\Client\System;

use Modules\Mall\Http\Controllers\Client\ClientController;
use Modules\Mall\Repositories\Interfaces\System\OnlineRepository;

class OnlineController extends ClientController
{
    public function __construct(OnlineRepository $online)
    {
        $this->online = $online;
    }

    public function index()
    {
        $this->apiDefault(['data' => $this->online->orderBy('sort', 'desc')->findByField('status', 'on')]);
    }
}
