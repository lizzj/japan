<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemRemindAliyunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('system_remind_aliyun')->insert(
            [
                'url' => 'https://oapi.dingtalk.com/robot/send?access_token=02bc1218ae7d44a74d3fab0467be44cb3820a83128428a6bfc61c42343ad3157',
                'secret' => 'SECeb1174d643e006ba75c06f0f36131d741562487b78bb79fbb71592995ae004f3',
                'status' => 'on',
                'created_at' => time()
            ]
        );
    }
}
