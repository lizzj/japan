<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallArticleArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mall_article_article', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('category_id')->nullable()->comment('所属分类');
            $table->string('name')->nullable()->comment('标题');
            $table->string('image')->nullable()->comment('图片');
            $table->string('short_description')->nullable()->comment('短描述');
            $table->json('keywords')->nullable()->comment('关键字');
            $table->text('content')->nullable()->comment('详情内容');
            $table->string('status')->nullable()->comment('显示状态');
            $table->string('default')->default('no')->nullable()->comment('是否默认');
            $table->smallInteger('sort')->default(0)->nullable()->comment('显示排序');
            $table->smallInteger('click')->default(0)->nullable()->comment('统计装填');
            $table->integer('created_at')->nullable();
            $table->integer('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mall_article_article');
    }
}
