<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsDebtCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('debt_collections', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'debt_collections MODIFY answer TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'debt_collections MODIFY paid TINYINT(1)');
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
        Schema::table('debt_collections', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'debt_collections MODIFY answer TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'debt_collections MODIFY paid TINYINT');
        });
        Schema::enableForeignKeyConstraints();
    }
}
