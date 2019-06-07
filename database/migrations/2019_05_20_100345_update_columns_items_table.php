<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('items', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'items MODIFY product_id TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'items MODIFY discount_type TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'items MODIFY discount_reason TINYINT(1)');
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
        Schema::table('items', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'items MODIFY product_id TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'items MODIFY discount_type TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'items MODIFY discount_reason TINYINT');
        });
        Schema::enableForeignKeyConstraints();
    }
}
