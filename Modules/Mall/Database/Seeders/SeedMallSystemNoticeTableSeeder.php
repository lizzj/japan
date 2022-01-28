<?php

namespace Modules\Mall\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedMallSystemNoticeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mall_system_notice')->insert(
            [
                'name' => '系统默认初始公告',
                'link' => 'no',
                'status' => 'on',
                'sort' => 0,
                'created_at' => time()
            ]
        );
    }
}
