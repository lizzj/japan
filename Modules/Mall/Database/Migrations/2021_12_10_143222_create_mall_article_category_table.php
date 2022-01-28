<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallArticleCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mall_article_category', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('展示标题');
            $table->string('show')->nullable()->comment('显示状态');
            $table->smallInteger('count')->default(0)->nullable()->comment('统计状态');
            $table->string('default')->nullable()->comment('是否默认');
            $table->string('status')->nullable()->comment('调用状态');
            $table->smallInteger('sort')->default(0)->nullable()->comment('排序状态');
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
        Schema::dropIfExists('mall_article_category');
    }
}
