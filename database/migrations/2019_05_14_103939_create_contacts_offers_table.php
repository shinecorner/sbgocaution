<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id');
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->string('file_name');
            $table->string('sent');
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
        Schema::dropIfExists('contacts_offers');
    }
}
