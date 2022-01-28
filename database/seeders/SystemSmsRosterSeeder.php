<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSmsRosterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('system_sms_roster')->insert(
            [
                'phone' => '15234801376',
                'type' => 'white',
                'remark' => '系统初始数据',
                'modules' => 'mall',
                'created_at' => time()
            ]
        );
          DB::table('system_sms_roster')->insert(
            [
                'phone' => '13754998418',
                'type' => 'white',
                'remark' => '系统初始数据',
                'modules' => 'mall',
                'created_at' => time()
            ]
        );
           DB::table('system_sms_roster')->insert(
            [
                'phone' => '15235762978',
                'type' => 'white',
                'remark' => '系统初始数据',
                'modules' => 'mall',
                'created_at' => time()
            ]
        );
    }
}
