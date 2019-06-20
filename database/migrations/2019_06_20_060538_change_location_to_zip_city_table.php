<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeLocationToZipCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('landlord_registrations', function (Blueprint $table) {
            $table->dropColumn(['location']);
            $table->string('zip',10)->after('email');
            $table->string('city',50)->after('zip');;
            $table->renameColumn('name','lastname');
            $table->renameColumn('society','company');
            $table->renameColumn('first_name','firstname');
            $table->renameColumn('phone','telephone');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('landlord_registrations', function (Blueprint $table) {
            $table->string('location');
            $table->dropColumn(['zip','city']);
            $table->renameColumn('lastname','name');
            $table->renameColumn('company','society');
            $table->renameColumn('firstname','first_name');
            $table->renameColumn('telephone','phone');
        });
    }
}
