<?php

namespace Modules\Mall\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeedAuthMallAdminRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('auth_mall_admin_roles')->insert(
            [
                'name' => '管理员',
                'code' => 'admin',
                'count' => 2,
                'status'=>'on',
                'created_at'=>time()
            ]
        );
    }
}
