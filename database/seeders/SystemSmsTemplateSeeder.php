<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSmsTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('system_sms_template')->insert(
            [
                'belong' => 'aliyun',
                'code' => 'code',
                'name' => '验证码短信',
                'template_no' => 'SMS_115920236',
                'template_sign' => '徕客工厂',
                'param' => 'code',
                'created_at' => time()
            ]
        );
    }
}
