<?php

namespace Modules\Mall\Http\Controllers\Admin\Member\Center;

use App\Exceptions\Exception\ErrorException;
use App\Jobs\Auth\User\Level\Change as LevelChange;
use App\Repositories\Interfaces\Auth\User\UserRepository;
use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\Member\Center\Member\UpdateRequest;
use Modules\Mall\Repositories\Interfaces\Member\Asset\BalanceRepository;
use Modules\Mall\Repositories\Interfaces\Member\Asset\CommissionRepository;

class MemberController extends AdminController
{
    public function __construct(UserRepository $user, BalanceRepository $balance, CommissionRepository $commission)
    {
        $this->authId();
        $this->user = $user;
        $this->balance = $balance;
        $this->commission = $commission;
    }

    public function index()
    {
        $title = \request()->title;
        $level_id = \request()->level;
        $limit = \request()->limit ?? 20;
        $interval = [\request()->start_at ?? 0, \request()->end_at ?? time()];
        $array = ArrayDetail(compact('level_id'));
        $this->apiDefault(['data' => $this->user->adminList($title, $array, $limit, $interval)]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $userInfo = $this->user->find($id)['data'];
        switch ($data['action']) {
            case 'level':
                //修改用户的级别信息
                LevelChange::dispatch($userInfo['level_id'], 'count', -1);
                LevelChange::dispatch($data['level_id'], 'count', 1);
                $this->user->update(['level_id' => $data['level_id']], $id);
                break;
            case 'balance':
                //修改用户的账户余额
                $log = [
                    'user_id' => $id,
                    'num' => $data['num'],
                    'type' => $data['type']
                ];
                $this->balance->processLog($log, $data['type'] === 'inc' ? 1 : 2);
                break;
            case 'commission':
                //修改用户的佣金
                $log = [
                    'user_id' => $id,
                    'num' => $data['num'],
                    'type' => $data['type']
                ];
                $this->commission->processLog($log, $data['type'] === 'inc' ? 1 : 2);
                break;
            case 'status':
                //修改用户的状态
                $this->user->update(['remember_token' => null, 'status' => $data['status']], $id);
                break;
            case 'parent':
                if ($data['parent'] === 'no') {
                    $this->user->update(['pid' => 0], $id);
                } else {
                    if (!$this->user->verifyParent($userInfo['pid'], $data['pid'], $id)) {
                        $this->Error(64001);
                    }
                }
                break;
            //先查看更改的id是否正确
            case 'password':
                //修改密码
                $this->user->changePassword($data['password'], $id);
                break;
            default:
                throw new ErrorException('ParameterException', arrayTransitionObject(['message' => '参数错误']));
        }
        $this->apiUpdate(['data' => null]);
    }

    public function remote()
    {
        $user = \request()->user ?? $this->Error(60021);
        $this->apiDefault(['data' => $this->user->remote($user)]);
    }

    public function lower($id)
    {
        $limit = request()->limit ?? 20;
        $this->apiDefault(['data' => $this->user->lowerList($id, $limit)]);
    }

    public function import()
    {

    }

    public function export($type)
    {
        if ($type === 'template') {
            //导出模板

        } elseif ($type === 'table') {
            //导出用户信息

        }
    }
}
