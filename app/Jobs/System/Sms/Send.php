<?php

namespace App\Jobs\System\Sms;

use App\Repositories\Interfaces\System\Sms\LogRepository;
use App\Services\Sms\Aliyun;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Send implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $logId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($logId)
    {
        $this->logId = $logId;
    }

    public function handle()
    {
        $log = app(LogRepository::class);
        $logInfo = $log->find($this->logId)['data'];
        if ($logInfo['operator'] === 'aliyun') {
            $ali_sms = new Aliyun();
            $log->processResult($ali_sms->send($this->logId, $logInfo['phone'], $logInfo['template_id'], $logInfo['content']), $this->logId, $logInfo['operator']);
        } elseif ($logInfo['operator'] === 'tencent') {
            return false;
        }
    }
}
