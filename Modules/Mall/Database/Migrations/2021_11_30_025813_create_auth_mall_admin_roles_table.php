<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthMallAdminRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_mall_admin_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable()->comment('名称');
            $table->string('code', 100)->nullable()->comment('Code');
            $table->smallInteger('count')->nullable()->comment('统计');
            $table->string('status', 20)->nullable()->comment('状态');
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
        Schema::dropIfExists('auth_mall_admin_roles');
    }
}
