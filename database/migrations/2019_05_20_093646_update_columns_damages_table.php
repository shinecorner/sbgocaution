<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsDamagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('damages', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'damages MODIFY send_to_generali TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'damages MODIFY special_case TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'damages MODIFY damage_recall TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'damages MODIFY signed_form TINYINT(1)');
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
        Schema::table('damages', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'damages MODIFY send_to_generali TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'damages MODIFY special_case TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'damages MODIFY damage_recall TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'damages MODIFY signed_form TINYINT');
        });
        Schema::enableForeignKeyConstraints();
    }
}
