<?php

namespace App\Jobs\System\Remind;

use App\Repositories\Interfaces\System\Remind\AliyunRepository;
use App\Repositories\Interfaces\System\Remind\ConfigRepository;
use App\Repositories\Interfaces\System\Remind\LogRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Modules\Mall\Repositories\Interfaces\System\ConfigRepository as SystemConfigRepository;

class Remind implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->config()['next_at'] < time()) {
            $log = app(LogRepository::class);
            $list = $log->findWhere(['send' => 'no'])['data'];
            $str = '1.系统名称:' . $this->system()['name'] . "\n";
            if (!empty($list)) {
                //证明有数据,
                for ($i = 0, $iMax = count($list); $i < $iMax; $i++) {
                    $str .= ($i + 2) . '.内容:' . $list[$i]['message'] . ',时间: ' . $list[$i]['created_at']->toDateTimeString() . "\n";
                }
                if ($this->config()['default'] === 'aliyun') {
                    if ($result = $this->aliyunSend($str)) {
                        $log->where(['send' => 'no'])->update(['send' => 'yes', 'send_code' => $result['errcode'], 'send_msg' => $result['errmsg'], 'send_at' => time()]);
                        //然后加上时间间隔
                        app(ConfigRepository::class)->update(['next_at' => time() + $this->config()['frequency'] * 60], 1);
                    }
                }
            }
        }
    }

    public function config()
    {
        $config = app(ConfigRepository::class);
        return $config->find(1)['data'];
    }

    public function system()
    {
        $config = app(SystemConfigRepository::class);
        return $config->find(1)['data'];
    }

    public function getAliyun()
    {
        $aliyun = app(AliyunRepository::class);
        return $aliyun->find(1)['data'];
    }

    public function aliyunSend($message)
    {
        $time = getUnixTimestamp();//unix时间戳
        $secret = $this->getAliyun()['secret'];
        $data = $time . "\n" . $secret;
        $signStr = base64_encode(hash_hmac('sha256', $data, $secret, true));
        $signStr = utf8_encode(urlencode($signStr));
        $webhook = $this->getAliyun()['url'] . "&timestamp=$time&sign=$signStr";
        $sendData = [
            'msgtype' => 'text', 'text' => ['content' => $message],
            'at' => [
                'atMobiles' => [], //被@人的手机号
                'isAtAll' => false, // 是否@所有人
            ]
        ];
        $response = Http::post($webhook, $sendData);
        return json_decode($response->body(), true);
    }

}
