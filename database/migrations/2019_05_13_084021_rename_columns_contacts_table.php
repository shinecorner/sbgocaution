<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnsContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->renameColumn('contact_formate', 'contact_num');
            $table->renameColumn('vorname', 'first_name');
            $table->renameColumn('nachname', 'last_name');
            $table->renameColumn('anrede', 'salutation');
            $table->renameColumn('telefon', 'phone');
            $table->renameColumn('birthday', 'birthdate');
            $table->renameColumn('residence_card_questios', 'residence_card_questions');
            $table->renameColumn('betreibungen', 'indebted');
            $table->renameColumn('Send_Offer_By', 'send_offer_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->renameColumn('contact_num', 'contact_formate');
            $table->renameColumn('first_name', 'vorname');
            $table->renameColumn('last_name', 'nachname');
            $table->renameColumn('salutation', 'anrede');
            $table->renameColumn('phone', 'telefon');
            $table->renameColumn('birthdate', 'birthday');
            $table->renameColumn('residence_card_questions', 'residence_card_questios');
            $table->renameColumn('indebted', 'betreibungen');
            $table->renameColumn('send_offer_by', 'Send_Offer_By');
        });
    }
}
