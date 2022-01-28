<?php

namespace App\Jobs\Auth\User\User;

use App\Models\Auth\User\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Change implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $id;
    private $field;
    private $num;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $field, $num)
    {
        //
        $this->id = $id;
        $this->field = $field;
        $this->num = $num;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        User::where(['id' => $this->id])->increment($this->field, $this->num);
    }
}
