<?php

namespace Modules\Mall\Http\Controllers\Admin\Member\Withdrawal;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\Member\Withdrawal\Log\UpdateRequest;
use Modules\Mall\Repositories\Interfaces\Member\Withdrawal\LogRepository;

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
        $type_id = \request()->type;
        $audit = \request()->audit;
        $user_id = \request()->user;
        $limit = \request()->limit ?? 20;
        $start_at = \request()->start_at ?? 0;
        $end_at = \request()->end_at ?? time();
        $interval = [$start_at, $end_at];
        $array = ArrayDetail(compact('type_id', 'audit', 'user_id'));
        $this->apiDefault(['data' => $this->log->adminList($title, $array, $limit, $interval)]);
    }

    public function update(UpdateRequest $request, $id)
    {
        //查看状态是否是no,是no的话 操作,如果不是no,则是操作失败
        $logInfo = $this->log->find($id)['data'];
        if ($logInfo['audit'] === 'no') {
            $data = $request->validated();
            if ($data['audit'] === 'reject') {
                $this->log->processLog($logInfo['user_id'], $logInfo['withdrawal_num'], 'inc');
            }
            $data['audit_at'] = time();
            $this->apiUpdate(['data' => $this->log->update($data, $id)]);
        }
        $this->Error(60002);
    }
}
