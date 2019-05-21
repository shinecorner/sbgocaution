<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsDamagesDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('damages_documents', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'damages_documents MODIFY type TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'damages_documents MODIFY internal TINYINT(1)');
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
        Schema::table('damages_documents', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'damages_documents MODIFY type TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'damages_documents MODIFY internal TINYINT');
        });
        Schema::enableForeignKeyConstraints();
    }
}
