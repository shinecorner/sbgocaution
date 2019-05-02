<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_additionals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->nullable();
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->string('prop_adress')->nullable();
            $table->string('prop_plz')->nullable();
            $table->string('prop_ort')->nullable();
            $table->string('rent')->nullable();
            $table->string('rent_beginn')->nullable();
            $table->string('lessor_type')->nullable();
            $table->string('lessor_name')->nullable();
            $table->string('lessor_contact')->nullable();
            $table->string('lessor_phone')->nullable();
            $table->string('lessor_adress')->nullable();
            $table->string('lessor_plz')->nullable();
            $table->string('lessor_ort')->nullable();
            $table->string('house_owner_name')->nullable();
            $table->string('house_owner_address')->nullable();
            $table->string('house_owner_plz')->nullable();
            $table->string('house_owner_city')->nullable();
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
        Schema::dropIfExists('contacts_additionals');
    }
}
