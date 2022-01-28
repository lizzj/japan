<?php

namespace App\Jobs\Auth\User\User;

use App\Models\Auth\User\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * @note: 关于每日活跃重置
 * @return ${TYPE_HINT}
 * ${THROWS_DOC}
 * @author:Je_taime
 * @time: 2022/1/11 9:26
 * ${PARAM_DOC}
 */
class Reset implements ShouldQueue
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
        //
        User::where(['is_active' => 1])->update(['is_active' => 0]);
    }
}
