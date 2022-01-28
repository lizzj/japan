<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallSystemNoticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mall_system_notice', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('展示标题');
            $table->string('link',)->nullable()->comment('是否链接');
            $table->string('link_type',)->nullable()->comment('链接类型');
            $table->string('link_id')->nullable()->comment('链接id');
            $table->string('status')->nullable()->comment('显示状态');
            $table->smallInteger('sort')->default(0)->nullable()->comment('显示排序');
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
        Schema::dropIfExists('mall_system_notice');
    }
}
