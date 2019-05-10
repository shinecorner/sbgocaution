<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePreconfirmationTypeInContactsOfferPreconfirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts_offer_preconfirms', function (Blueprint $table) {
            $table->dropColumn('preconfirmation_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts_offer_preconfirms', function (Blueprint $table) {
            $table->integer('preconfirmation_type')->nullable();
        });
    }
}
