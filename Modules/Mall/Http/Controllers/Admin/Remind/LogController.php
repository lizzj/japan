<?php

namespace Modules\Mall\Http\Controllers\Admin\Remind;

use App\Repositories\Interfaces\System\Remind\LogRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Mall\Http\Controllers\Admin\AdminController;

class LogController extends AdminController
{
    public function __construct(LogRepository $log)
    {
        $this->authId();
        $this->log = $log;
    }

    public function index()
    {
        $title = \request()->title;
        $limit = \request()->limit ?? 20;
        $this->apiDefault(['data' => $this->log->adminList($title, $limit)]);
    }
}
