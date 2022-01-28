<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthUserUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_user_user', function (Blueprint $table) {
            $table->id();
            $table->string('account')->nullable()->comment('账号');
            $table->string('avatar')->nullable()->comment('头像');
            $table->string('name')->nullable()->comment('姓名');
            $table->string('phone')->nullable()->comment('手机号码');
            $table->string('original')->nullable()->comment('密码');
            $table->string('password')->nullable()->comment('密码');
            $table->string('remember_token', 500)->nullable()->comment('token');
            $table->smallInteger('level_id')->nullable()->comment('级别');
            $table->smallInteger('pid')->nullable()->comment('上级');
            $table->string('token')->nullable()->comment('token');
            $table->integer('last_login')->nullable()->comment('登录时间');
            $table->decimal('balance', 8, 2)->default(0)->nullable()->comment('余额');
            $table->decimal('commission', 8, 2)->default(0)->nullable()->comment('佣金--可提现');
            $table->decimal('expense', 8, 2)->default(0)->nullable()->comment('累计消费');
            $table->decimal('recharge', 8, 2)->default(0)->nullable()->comment('累计充值');
            $table->string('status')->nullable()->comment('状态');
            $table->string('nickname')->nullable()->comment('昵称');
            $table->string('openid')->nullable()->comment('openid-微信');
            $table->string('unionid')->nullable()->comment('unionid-微信');
            $table->smallInteger('is_active')->default(0)->nullable()->comment('统计是否活跃');
            $table->string('sex')->nullable()->comment('性别');
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
        Schema::dropIfExists('auth_user_user');
    }
}
