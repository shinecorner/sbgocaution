<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumns3ContactsTable extends Migration
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
            $table->boolean('rc_policy')->default(0)->change();
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
            $table->string('rc_policy')->default(NULL)->change();
        });
        Schema::enableForeignKeyConstraints();
    }
}
