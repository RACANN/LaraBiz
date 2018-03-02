<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('merchant_session_start');
            $table->dateTime('merchant_session_end');
            $table->double('cash_start');
            $table->double('cash_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchant_sessions');
    }
}
