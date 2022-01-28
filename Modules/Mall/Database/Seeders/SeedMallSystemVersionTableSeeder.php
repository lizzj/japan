<?php

namespace Modules\Mall\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeedMallSystemVersionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mall_system_version')->insert(
            [
                'version' => '0.0.0',
                'log' => json_encode(['option'=>'开发版本']),
                'platform' => 'android',
                'force' => 'no',
                'status' => 'on',
                'release' => 'yes',
                'url' => '/Default/Apk/default.apk',
                'created_at' => time()
            ]
        );
    }
}
