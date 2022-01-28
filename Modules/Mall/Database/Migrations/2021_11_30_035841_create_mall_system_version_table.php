<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallSystemVersionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mall_system_version', function (Blueprint $table) {
            $table->id();
            $table->string('version')->nullable();
            $table->json('log')->nullable();
            $table->string('platform')->nullable();
            $table->string('force')->nullable();
            $table->string('url')->nullable();
            $table->string('status',)->nullable();
            $table->string('release')->nullable();
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
        Schema::dropIfExists('mall_system_version');
    }
}
