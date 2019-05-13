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
            $table->renameColumn('nachname', 'name');
            $table->renameColumn('vorname', 'firstname');
            $table->renameColumn('anrede', 'salutation');
            $table->renameColumn('telefon', 'phone');
            $table->renameColumn('birthday', 'birthdate');
            $table->renameColumn('betreibungen', 'indebted');
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
            $table->renameColumn('name', 'nachname');
            $table->renameColumn('firstname', 'vorname');
            $table->renameColumn('salutation', 'anrede');
            $table->renameColumn('phone', 'telefon');
            $table->renameColumn('birthdate', 'birthday');
            $table->renameColumn('indebted', 'betreibungen');
        });
    }
}
