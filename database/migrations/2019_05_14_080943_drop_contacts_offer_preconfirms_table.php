<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropContactsOfferPreconfirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('contacts_offer_preconfirms');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('contacts_offer_preconfirms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id');
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->text('preconfirmation_file_name', 65535);
            $table->text('preconfirmation_sent', 65535);
            $table->date('preconfirmation_sent_date');
            $table->boolean('preconfirmation_reminder_sent');
            $table->text('offer_file_name', 65535);
            $table->text('offer_sent', 16777215);
            $table->timestamps();
        });
    }
}
