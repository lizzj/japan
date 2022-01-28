<?php

namespace App\Jobs\System\Payment;

use App\Jobs\Auth\User\Level\Reward;
use App\Jobs\Auth\User\User\Info;
use App\Models\System\Payment\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\Mall\Repositories\Interfaces\Member\Asset\BalanceRepository;
use Modules\Mall\Repositories\Interfaces\System\OnlineRepository;

class Alipay implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $result;
    private $token;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($token, $result)
    {
        //
        $this->token = $token;
        $this->result = $result;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $logInfo = Log::where(['token' => $this->token])->whereNull('notify_at')->first();
        if ($logInfo->relate_type === 'level') {
            //开通会员 先奖励 然后在改用户级别
            Reward::dispatch($logInfo->user_id, $logInfo->price, 'level');
            Info::dispatch($logInfo->user_id, 'level_id', $logInfo->relate_id);
        } elseif ($logInfo->relate_type === 'online') {
            //在线充值
            $online = app(OnlineRepository::class);
            $onlineInfo = $online->find($logInfo->relate_id)['data'];
            $logData = [
                'user_id' => $logInfo->user_id,
                'type' => 'inc',
                'num' => $onlineInfo['actual'],
                'option' => $logInfo->relate_type
            ];
            Reward::dispatch($logInfo->user_id, $logInfo->price, 'recharge');
            $balance = app(BalanceRepository::class);
            $balance->processLog($logData, 5);
        }
        //修改订单状态
        $logInfo->status = 'success';
        $logInfo->result = $this->result;
        $logInfo->notify_at = time();
        $logInfo->save();
    }
}
