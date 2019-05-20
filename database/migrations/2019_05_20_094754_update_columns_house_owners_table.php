<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsHouseOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('house_owners', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'house_owners MODIFY is_duplicate TINYINT(1)');
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
        Schema::table('house_owners', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'house_owners MODIFY is_duplicate TINYINT');
        });
        Schema::enableForeignKeyConstraints();
    }
}
