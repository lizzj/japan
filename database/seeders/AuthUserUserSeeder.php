<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthUserUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('auth_user_user')->insert(
            [
                'name' => '二狗',
                'avatar' => '/Default/Avatar/1.jpg',
                'account' => 'ergou',
                'phone' => '15234801376',
                'password' => Hash::make('1'),
                'level_id' => 1,
                'pid' => 0,
                'token' => 'lizzj',
                'original' => '1',
                'status' => 'on',
                'sex' => 'm',
                'created_at' => time()
            ]
        );
        DB::table('auth_user_user')->insert(
            [
                'name' => '韩豆豆',
                'avatar' => '/Default/Avatar/2.jpg',
                'account' => 'hdd',
                'phone' => '13754998418',
                'password' => Hash::make('1'),
                'level_id' => 1,
                'pid' => 0,
                'token' => Str::random(12),
                'original' => '1',
                'status' => 'on',
                'sex' => 'm',
                'created_at' => time()
            ]
        );
        DB::table('auth_user_user')->insert(
            [
                'name' => '薛肖飞',
                'avatar' => '/Default/Avatar/3.jpg',
                'account' => 'xxf',
                'phone' => '15235762978',
                'password' => Hash::make('1'),
                'level_id' => 1,
                'pid' => 0,
                'token' => Str::random(12),
                'original' => '1',
                'status' => 'on',
                'sex' => 'm',
                'created_at' => time()
            ]
        );
    }
}
