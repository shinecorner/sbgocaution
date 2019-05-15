<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnsAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->renameColumn('co_address_name', 'co_name');
            $table->renameColumn('plz', 'zip');
            $table->renameColumn('ort', 'city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->renameColumn('co_name', 'co_address_name');
            $table->renameColumn('zip', 'plz');
            $table->renameColumn('city', 'ort');
        });
    }
}
