<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsPresavedContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('presaved_contacts', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'presaved_contacts MODIFY sent TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'presaved_contacts MODIFY deleted TINYINT(1)');
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
        Schema::table('presaved_contacts', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'presaved_contacts MODIFY sent TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'presaved_contacts MODIFY deleted TINYINT');
        });
        Schema::enableForeignKeyConstraints();
    }
}
