<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsContactsPreconfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('contacts_preconfirmations', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'contacts_preconfirmations MODIFY reminder_sent TINYINT(1)');
            $table->text('sent')->change();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('contacts_preconfirmations', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'contacts_preconfirmations MODIFY reminder_sent TINYINT');
            $table->string('sent')->change();
        });
        Schema::enableForeignKeyConstraints();
    }
}
