<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('countries', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'countries MODIFY alpha_2 CHAR(2)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'countries MODIFY alpha_3 CHAR(3)');
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
        Schema::table('countries', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'countries MODIFY alpha_2 CHAR(255)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'countries MODIFY alpha_3 CHAR(255)');
        });
        Schema::enableForeignKeyConstraints();
    }
}
