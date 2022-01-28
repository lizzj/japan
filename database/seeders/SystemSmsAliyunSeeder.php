<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSmsAliyunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('system_sms_aliyun')->insert(
            [
                'key' => 'LTAIeHQPgHc2SPh5',
                'secret' => 'e2QEEvHl4OCUxfzB7QHUpBiggYqVBz',
                'url' => 'dysmsapi.aliyuncs.com',
                'status' => 'on',
                'created_at' => time()
            ]
        );
    }
}
