<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemRemindConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_remind_config', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('frequency')->nullable();
            $table->string('status')->nullable();
            $table->string('default')->nullable();
            $table->json('week')->nullable();
            $table->json('hour')->nullable();
            $table->integer('next_at')->default(0)->nullable();
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
        Schema::dropIfExists('system_remind_config');
    }
}
