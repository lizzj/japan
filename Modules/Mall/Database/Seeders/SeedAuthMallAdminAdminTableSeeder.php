<?php

namespace Modules\Mall\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SeedAuthMallAdminAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auth_mall_admin_admin')->insert(
            [
                'name' => '二狗',
                'avatar' => '/Default/Avatar/1.jpg',
                'account' => 'ergou',
                'phone' => '15234801376',
                'email' => 'li_zzj@163.com',
                'password' => Hash::make('1'),
                'roles_id' => 1,
                'original'=>'1',
                'status'=>'on',
                'sex'=>'m',
                'introduction'=>'初始账号',
                'created_at'=>time()
            ]
        );
        DB::table('auth_mall_admin_admin')->insert(
            [
                'name' => '管理员',
                'avatar' => '/Default/Avatar/3.jpg',
                'account' => 'admin',
                'phone' => '03575123456',
                'email' => 'sx12du@163.com',
                'password' => Hash::make('12keji'),
                'roles_id' => 1,
                'original'=>'12keji',
                'status'=>'on',
                'sex'=>'m',
                'introduction'=>'管理员',
                'created_at'=>time()
            ]
        );
    }
}
