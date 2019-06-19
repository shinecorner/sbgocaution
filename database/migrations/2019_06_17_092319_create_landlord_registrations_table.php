<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandlordRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landlord_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('society')->nullable();
            $table->string('name');
            $table->string('first_name');
            $table->text('address');
            $table->string('location');
            $table->string('phone',15);
            $table->string('ip_address',45)->nullable();
            $table->string('email',191)->unique();
            $table->string('language',10);
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
        Schema::dropIfExists('landlord_registrations');
    }
}
