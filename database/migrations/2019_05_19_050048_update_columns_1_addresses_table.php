<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumns1AddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('addresses', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'addresses MODIFY type TINYINT(1) COMMENT \'1 = normal address, 2 = c/o address\' DEFAULT 1');
            $table->boolean('from_partner')->default(0)->change();
            $table->boolean('not_correct')->default(0)->change();
            $table->dropColumn('ordering');
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
        Schema::table('addresses', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'addresses MODIFY type TINYINT COMMENT \'1 = normal address, 2 = c/o address\' DEFAULT 1');
            $table->string('from_partner')->nullable(false)->default('')->change();
            $table->string('not_correct')->nullable(false)->default('')->change();
            $table->integer('ordering')->default(0);
        });
        Schema::enableForeignKeyConstraints();
    }
}
