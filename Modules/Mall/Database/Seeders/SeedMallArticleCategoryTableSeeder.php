<?php

namespace Modules\Mall\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedMallArticleCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mall_article_category')->insert(
            [
                'name' => '注册协议',
                'show' => 'off',
                'status' => 'on',
                'count' => 1,
                'default' => 'yes',
                'created_at' => time(),
            ]
        );
    }
}
