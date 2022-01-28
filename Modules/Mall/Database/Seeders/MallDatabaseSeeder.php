<?php

namespace Modules\Mall\Database\Seeders;

use Illuminate\Database\Seeder;

class MallDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SeedAuthMallAdminAdminTableSeeder::class,
            SeedAuthMallAdminRolesTableSeeder::class,
            SeedMallSystemConfigTableSeeder::class,
            SeedMallSystemVersionTableSeeder::class,
            SeedMallSystemNoticeTableSeeder::class
        ]);
    }
}
