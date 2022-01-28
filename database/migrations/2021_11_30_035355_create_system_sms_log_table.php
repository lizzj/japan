<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSmsLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_sms_log', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable()->comment('手机号码');
            $table->smallInteger('template_id')->nullable()->comment('模板id');
            $table->json('content')->nullable()->comment('发送内容');
            $table->string('type')->nullable()->comment('类型');
            $table->string('verify')->nullable()->comment('验证状态');
            $table->integer('send_at')->nullable()->comment('发送时间');
            $table->string('send_code')->nullable()->comment('发送状态');
            $table->string('send_msg')->nullable()->comment('返回信息');
            $table->string('operator')->nullable()->comment('运营商');
            $table->string('modules')->nullable()->comment('模块');
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
        Schema::dropIfExists('system_sms_log');
    }
}
