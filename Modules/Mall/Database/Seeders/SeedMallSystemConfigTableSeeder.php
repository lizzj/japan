<?php

namespace Modules\Mall\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeedMallSystemConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mall_system_config')->insert(
            [
                'name' => '系统名称',
                'logo' => '/Default/Config/logo.png',
                'company' => '山西12度',
                'description' => '系统软件--app简介',
                'service_phone' => 'app简介',
                'service_qrcode' => '/Default/Config/qrcode.png',
                'service_time' => '客服服务时间',
                'created_at' => time(),
                'updated_at' => time()
            ]
        );
    }
}
