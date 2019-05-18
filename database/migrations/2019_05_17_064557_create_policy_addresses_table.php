<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolicyAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('policy_id');
            $table->foreign('policy_id')->references('id')->on('policies');
            $table->string('address');
            $table->string('zip');
            $table->string('state');
            $table->string('city');
            $table->string('rent_beginn');
            $table->string('rent');
            $table->integer('deposit_amount');
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
        Schema::dropIfExists('policy_addresses');
    }
}
