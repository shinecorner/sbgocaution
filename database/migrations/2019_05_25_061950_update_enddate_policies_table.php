<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEnddatePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('policies', function (Blueprint $table) {
            DB::statement('ALTER TABLE  ' . DB::getTablePrefix() . 'policies MODIFY enddate DATETIME NOT NULL DEFAULT "0000-00-00"');
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
        Schema::table('policies', function (Blueprint $table) {
            DB::statement('ALTER TABLE  ' . DB::getTablePrefix() . 'policies MODIFY enddate DATETIME NOT NULL');

        });
        Schema::enableForeignKeyConstraints();
    }
}
