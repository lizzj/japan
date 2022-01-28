<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemRemindConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('system_remind_config')->insert(
            [
                'status' => 'on',
                'default' => 'aliyun',
                'frequency' => 5,
                'week' => json_encode([0,1,2,3,4,5,6]),
                'hour' =>json_encode([8,23]),
                'created_at' => time()
            ]
        );
    }
}
