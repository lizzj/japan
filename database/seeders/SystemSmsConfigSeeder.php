<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSmsConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('system_sms_config')->insert(
            [
                'default' => 'aliyun',
                'throttle' => 60,
                'threshold' => 10,
                'verify' => 60,
                'created_at' => time()
            ]
        );
    }
}
