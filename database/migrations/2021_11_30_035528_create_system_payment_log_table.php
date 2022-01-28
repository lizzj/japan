<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemPaymentLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_payment_log', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('user_id')->nullable();
            $table->smallInteger('account_id')->nullable();
            $table->decimal('money')->nullable();
            $table->integer('notify_at')->nullable();
            $table->string('account_type')->nullable();
            $table->string('out_trade_no')->nullable();
            $table->string('relate_type')->nullable();
            $table->smallInteger('relate_id')->nullable();
            $table->json('result')->nullable();
            $table->string('status')->nullable();
            $table->string('subject')->nullable();
            $table->string('token')->nullable();
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
        Schema::dropIfExists('system_payment_log');
    }
}
