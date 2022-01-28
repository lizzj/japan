<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthUserLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_user_level', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('名称');
            $table->string('icon')->nullable()->comment('icon');
            $table->integer('weight')->nullable()->comment('权重');
            $table->smallInteger('count')->nullable()->comment('统计');
            $table->string('status')->nullable()->comment('状态');
            $table->string('default')->nullable()->comment('状态');
            $table->string('description')->nullable()->comment('会员简述');
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
        Schema::dropIfExists('auth_user_level');
    }
}
