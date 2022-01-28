<?php

namespace Modules\Mall\Http\Controllers\Client\System;

use Modules\Mall\Http\Controllers\Client\ClientController;
use Modules\Mall\Repositories\Interfaces\System\SwipeRepository;

class SwipeController extends ClientController
{
    public function __construct(SwipeRepository $swipe)
    {
        $this->swipe = $swipe;
    }

    public function index()
    {
        $location = request()->location ?? $this->Error(60021);
        $this->apiDefault(['data' => $this->swipe->orderBy('sort', 'desc')->findWhere(['status' => 'on', 'location' => $location])]);
    }
}
