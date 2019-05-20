<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'certificates MODIFY date DATETIME');
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
        DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'certificates MODIFY date TIMESTAMP');
        Schema::enableForeignKeyConstraints();
    }
}
