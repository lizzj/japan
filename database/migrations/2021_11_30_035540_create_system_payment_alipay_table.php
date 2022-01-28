<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemPaymentAlipayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_payment_alipay', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('app_id')->nullable();
            $table->text('app_secret_cert')->nullable();
            $table->string('app_secret_cert_file')->nullable();
            $table->string('app_public_cert_path')->nullable();
            $table->string('alipay_public_cert_path')->nullable();
            $table->string('alipay_root_cert_path')->nullable();
            $table->string('status')->nullable();
            $table->smallInteger('mode')->nullable();
            $table->string('mode_type')->nullable();
            $table->string('service_provider_id')->nullable();
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
        Schema::dropIfExists('system_payment_alipay');
    }
}
