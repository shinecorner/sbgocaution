<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGarantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('policy_id')->unsigned();
            $table->foreign('policy_id')->references('id')->on('policies');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('adress');
            $table->string('zip',200);
            $table->string('city',200);
            $table->string('birthdate',200);
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
        Schema::dropIfExists('garants');
    }
}
