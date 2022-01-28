<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthMallAdminAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_mall_admin_admin', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable()->comment('姓名');
            $table->string('avatar', 100)->nullable()->comment('头像');
            $table->string('account', 100)->nullable()->comment('账号');
            $table->smallInteger('roles_id')->nullable();
            $table->string('email', 100)->nullable()->comment('邮箱');
            $table->string('phone', 100)->nullable()->comment('手机号码');
            $table->string('original', 100)->nullable()->comment('原始密码');
            $table->string('password', 100)->nullable()->comment('密码');
            $table->string('remember_token', 500)->nullable();
            $table->integer('last_login')->nullable();
            $table->string('status', 20)->nullable()->comment('状态');
            $table->string('nickname', 100)->nullable()->comment('昵称');
            $table->string('openid', 100)->nullable()->comment('openid');
            $table->string('uuid', 100)->nullable()->comment('uuid');
            $table->string('sex', 20)->nullable()->comment('uuid');
            $table->text('introduction')->nullable()->comment('简介');
            $table->integer('created_at')->nullable();
            $table->integer('updated_at')->nullable();
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
        Schema::dropIfExists('auth_mall_admin_admin');
    }
}
