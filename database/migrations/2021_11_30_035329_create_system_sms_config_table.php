<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSmsConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_sms_config', function (Blueprint $table) {
            $table->id();
            $table->string('default')->nullable()->comment('默认短信运营商');
            $table->integer('throttle')->nullable()->comment('频率');
            $table->integer('threshold')->nullable()->comment('当天');
            $table->integer('verify')->nullable()->comment('验证');
            $table->integer('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_sms_config');
    }
}
