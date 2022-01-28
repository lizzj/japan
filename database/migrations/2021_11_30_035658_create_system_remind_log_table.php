<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemRemindLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_remind_log', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('message', 500)->nullable();
            $table->string('operator')->nullable();
            $table->string('send')->nullable();
            $table->integer('send_at')->nullable();
            $table->string('send_msg')->nullable();
            $table->string('send_code')->nullable();
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
        Schema::dropIfExists('system_remind_log');
    }
}
