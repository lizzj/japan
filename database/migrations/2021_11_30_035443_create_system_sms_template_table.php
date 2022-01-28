<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSmsTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_sms_template', function (Blueprint $table) {
            $table->id();
            $table->string('belong')->nullable();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->string('template_no')->nullable();
            $table->string('template_sign')->nullable();
            $table->string('param')->nullable();
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
        Schema::dropIfExists('system_sms_template');
    }
}
