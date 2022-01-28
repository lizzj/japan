<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMallSystemConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mall_system_config', function (Blueprint $table) {
            $table->id();
            $table->string('name',)->nullable();
            $table->string('logo')->nullable();
            $table->string('company')->nullable();
            $table->text('description')->nullable();
            $table->string('service_phone')->nullable();
            $table->string('service_qrcode')->nullable();
            $table->string('service_time')->nullable();
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
        Schema::dropIfExists('mall_system_config');
    }
}
