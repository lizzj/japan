<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSmsAliyunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_sms_aliyun', function (Blueprint $table) {
            $table->id();
            $table->string('key')->nullable();
            $table->string('secret')->nullable();
            $table->string('url')->nullable();
            $table->string('status')->nullable();
            $table->integer('created_at')->nullable();
            $table->integer('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_sms_aliyun');
    }
}
