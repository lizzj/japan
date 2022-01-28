<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSmsRosterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_sms_roster', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable()->comment('手机号码');
            $table->string('remark')->nullable()->comment('备注');
            $table->string('modules')->nullable()->comment('模块');
            $table->string('type')->nullable()->comment('black/white');
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
        Schema::dropIfExists('system_sms_roster');
    }
}
