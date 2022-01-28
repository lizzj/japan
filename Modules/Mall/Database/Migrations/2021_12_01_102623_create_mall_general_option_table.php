<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallGeneralOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mall_general_option', function (Blueprint $table) {
            $table->id();
            $table->string('belong')->nullable();
            $table->string('relate')->nullable();
            $table->string('key')->nullable();
            $table->string('name')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('mall_general_option');
    }
}
