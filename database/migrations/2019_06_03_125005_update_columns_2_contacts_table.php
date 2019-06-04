<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumns2ContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('contacts', function (Blueprint $table) {
            $table->date('birthdate')->nullable(false)->default('0000-00-00')->change();
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
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('birthdate')->nullable()->default(NULL)->change();
        });
        Schema::enableForeignKeyConstraints();
    }
}
