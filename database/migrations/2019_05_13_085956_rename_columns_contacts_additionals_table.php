<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnsContactsAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts_additionals', function (Blueprint $table) {
            $table->renameColumn('prop_adress', 'property_address');
            $table->renameColumn('prop_plz', 'property_zip');
            $table->renameColumn('prop_ort', 'property_city');
            $table->renameColumn('rent_beginn', 'rent_begin');
            $table->renameColumn('rent', 'rent_amount');
            $table->renameColumn('lessor_adress', 'lessor_address');
            $table->renameColumn('lessor_plz', 'lessor_zip');
            $table->renameColumn('lessor_ort', 'lessor_city');
            $table->renameColumn('house_owner_plz', 'house_owner_zip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts_additionals', function (Blueprint $table) {
            $table->renameColumn('property_address', 'prop_adress');
            $table->renameColumn('property_zip', 'prop_plz');
            $table->renameColumn('property_city', 'prop_ort');
            $table->renameColumn('rent_begin', 'rent_beginn');
            $table->renameColumn('rent_amount', 'rent');
            $table->renameColumn('lessor_address', 'lessor_adress');
            $table->renameColumn('lessor_zip', 'lessor_plz');
            $table->renameColumn('lessor_city', 'lessor_ort');
            $table->renameColumn('house_owner_zip', 'house_owner_plz');
        });
    }
}
