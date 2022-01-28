<?php

namespace Modules\Mall\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedMallArticleArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mall_article_article')->insert(
            [
                'category_id' => 1,
                'name' => '用户注册协议',
                'short_description' => '<<' . '用户注册协议' . '>>',
                'keywords' => json_encode(['注册', '协议']),
                'content' => '用户注册协议内容--富文本',
                'status' => 'on',
                'sort' => 1,
                'click' => 0,
                'default' => 'yes',
                'created_at' => time(),
            ]
        );
    }
}
