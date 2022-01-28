<?php

namespace Modules\Mall\Http\Controllers\Client\Member\Asset;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Mall\Http\Controllers\Client\ClientController;
use Modules\Mall\Repositories\Interfaces\Member\Asset\CommissionRepository;

class CommissionController extends ClientController
{

    public function __construct(CommissionRepository $commission)
    {
        $this->authId();
        $this->commission = $commission;
    }

    public function index()
    {
        //获取余额日志
        $year = \request()->year ?? date('Y');
        $month = \request()->month ?? date('m');
        $interval = monthFirstAndLast($year, $month);
        $user_id = $this->authId();
        $source = \request()->source;
        $type = \request()->type;
        $limit = \request()->limit ?? 20;
        $array = ArrayDetail(compact('user_id', 'source', 'type'));
        $this->apiDefault(['data' => $this->commission->selfList($array, $interval, $limit)]);
    }
}
