<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrokersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brokers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('policy_id');
            $table->string('company_name');
            $table->tinyInteger('title');
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('address');
            $table->string('zip');
            $table->string('city');
            $table->string('email');
            $table->string('website');
            $table->integer('real_broker_num');
            $table->string('number',50);
            $table->string('mobile');
            $table->string('phone');
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
        Schema::dropIfExists('brokers');
    }
}
