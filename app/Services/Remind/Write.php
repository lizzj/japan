<?php

namespace App\Services\Remind;

use App\Models\System\Remind\Log;
use App\Repositories\Interfaces\System\Remind\ConfigRepository;

class Write
{
    public static function config()
    {
        $config = app(ConfigRepository::class);
        return $config->find(1)['data'];
    }

    public static function index($message, $code)
    {
        $configInfo = self::config();
        //获取时间是不是在时间段内  如果在时间段内 则send为no 如果不在时间段内则为yes
        $week = (int)date('w');
        $hour = (int)date('H');
        if (in_array($week, $configInfo['week'], true)) {
            //然后在判断  是不是在区间段内
            if (ArrayBetween($configInfo['hour'][0], $configInfo['hour'][1], $hour)) {
                $send = 'no';
            } else {
                $send = 'yes';
            }
        } else {
            $send = 'yes';
        }
        Log::create(['send' => $configInfo['status'] === 'off' ? 'yes' : $send, 'send_at' => $configInfo['status'] === 'off' ? time() : null, 'message' => $message, 'code' => $code]);
    }

}
