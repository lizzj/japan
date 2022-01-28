<?php

namespace Modules\Mall\Http\Controllers\Admin\Member\Asset;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Repositories\Interfaces\Member\Asset\CommissionRepository;

class CommissionController extends AdminController
{
    public function __construct(CommissionRepository $commission)
    {
        $this->authId();
        $this->commission = $commission;
    }

    public function index()
    {
        $user_id = \request()->user;
        $source = \request()->source;
        $title = \request()->title;
        $limit = \request()->limit ?? 20;
        $start_at = \request()->start_at ?? 0;
        $end_at = \request()->end_at ?? time();
        $array = ArrayDetail(compact('user_id', 'source'));
        $interval = [$start_at, $end_at];
        $this->apiDefault(['data' => $this->commission->adminList($title, $array, $limit, $interval)]);
    }
}
