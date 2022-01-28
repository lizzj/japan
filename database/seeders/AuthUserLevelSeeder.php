<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthUserLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('auth_user_level')->insert(
            [
                'name' => '默认级别',
                'icon' => '/Default/Config/level.png',
                'weight' => 0,
                'default' => 'yes',
                'status' => 'on',
                'description' => '默认会员',
                'created_at' => time()
            ]
        );
    }
}
