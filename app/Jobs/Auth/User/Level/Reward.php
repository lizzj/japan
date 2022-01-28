<?php

namespace App\Jobs\Auth\User\Level;

use App\Repositories\Interfaces\Auth\User\LevelRepository;
use App\Repositories\Interfaces\Auth\User\UserRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\Mall\Repositories\Interfaces\Member\Asset\CommissionRepository;

class Reward implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user_id;
    private $money;
    private $type;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id, $money, $type)
    {
        //
        $this->user_id = $user_id;
        $this->money = $money;
        $this->type = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //先查看这个用户的级别和上级的级别进行比较
        $userInfo = $this->getUser($this->user_id);
        if ($userInfo['pid'] !== 0) {
            $this->findTop($userInfo['pid'], null);
        }
    }

    public function getUser($user_id)
    {
        $user = app(UserRepository::class);
        return $user->find($user_id)['data'];
    }

    public function verifyLevel($old_level, $new_level)
    {
        if ($old_level === null) {
            return true;
        }
        $level = app(LevelRepository::class);
        $newInfo = $level->find($new_level)['data'];
        $oldInfo = $level->find($old_level)['data'];
        return $newInfo['weight'] > $oldInfo['weight'];
    }

     public function findTop($user_id, $old_level)
    {
        $userInfo = $this->getUser($user_id);
        if ($this->verifyLevel($userInfo['level_id'], $old_level)) {
            //然后获取奖励
            $scale = $this->getRange($old_level, $userInfo['level_id']);
            $re_num = $this->money * $scale / 100;
            if ($re_num !== 0) {
                $this->processLog($userInfo['id'], $re_num);
            }
            if ($userInfo['pid'] !== 0) {
                $this->findTop($userInfo['pid'], $userInfo['level_id']);
            }
        }
    }
     public function getRange($old_level, $new_level)
    {
        $level = app(LevelRepository::class);
        $newInfo = $level->find($new_level)['data'];
        if ($old_level === null) {
            if ($this->type === 'level') {
                return $newInfo['level_reward'];
            }
            return $newInfo['recharge_reward'];
        } else {
            $oldInfo = $level->find($old_level)['data'];
            if ($this->type === 'level') {
                return $newInfo['level_reward'] - $oldInfo['level_reward'];
            }
            return $newInfo['recharge_reward'] - $oldInfo['recharge_reward'];
        }
    }
     public function processLog($user_id, $num)
    {
        $commissionData = [
            'user_id' => $user_id,
            'type' => 'inc',
            'num' => $num,
        ];
        $commission = app(CommissionRepository::class);
        $commission->processLog($commissionData, $this->type==='level'?3:4);
    }
}
