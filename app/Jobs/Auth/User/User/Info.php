<?php

namespace App\Jobs\Auth\User\User;

use App\Models\Auth\User\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Info implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user_id;
    private $field;
    private $value;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id, $field, $value)
    {
        //
        $this->user_id = $user_id;
        $this->field = $field;
        $this->value = $value;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        User::where(['id' => $this->user_id])->update([$this->field => $this->value]);
    }
}
