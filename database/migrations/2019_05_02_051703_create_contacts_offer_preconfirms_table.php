<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsOfferPreconfirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_offer_preconfirms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->nullable();
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->text('preconfirmation_file_name', 65535)->nullable();
            $table->integer('preconfirmation_type')->nullable();
            $table->text('preconfirmation_sent', 65535)->nullable();
            $table->date('preconfirmation_sent_date')->nullable();
            $table->boolean('preconfirmation_reminder_sent')->nullable();
            $table->text('offer_file_name', 65535)->nullable();
            $table->text('offer_sent', 16777215)->nullable();
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
        Schema::dropIfExists('contacts_offer_preconfirms');
    }
}
