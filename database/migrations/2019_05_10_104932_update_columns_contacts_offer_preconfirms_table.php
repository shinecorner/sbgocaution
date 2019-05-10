<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsContactsOfferPreconfirmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts_offer_preconfirms', function (Blueprint $table) {
            $table->string('preconfirmation_file_name')->nullable(false)->default('')->change();
            $table->string('preconfirmation_sent')->nullable(false)->default('')->change();
            $table->string('preconfirmation_sent_date')->nullable(false)->default('')->change();
            $table->string('preconfirmation_reminder_sent')->nullable(false)->default('')->change();
            $table->string('offer_file_name')->nullable(false)->default('')->change();
            $table->string('offer_sent')->nullable(false)->default('')->change();
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
            $table->string('preconfirmation_file_name')->nullable()->default(NULL)->change();
            $table->string('preconfirmation_sent')->nullable()->default(NULL)->change();
            $table->string('preconfirmation_sent_date')->nullable()->default(NULL)->change();
            $table->string('preconfirmation_reminder_sent')->nullable()->default(NULL)->change();
            $table->string('offer_file_name')->nullable()->default(NULL)->change();
            $table->string('offer_sent')->nullable()->default(NULL)->change();
        });
    }
}
