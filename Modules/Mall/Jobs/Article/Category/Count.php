<?php

namespace Modules\Mall\Jobs\Article\Category;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\Mall\Entities\Article\Category;

class Count implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $id;
    private $num;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $num)
    {
        //
        $this->id = $id;
        $this->num = $num;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Category::find($this->id)->increment('count', $this->num);
    }
}
