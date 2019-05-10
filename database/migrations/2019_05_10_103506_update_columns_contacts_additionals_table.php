<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsContactsAdditionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts_additionals', function (Blueprint $table) {
            $table->string('prop_adress')->nullable(false)->default('')->change();
            $table->string('prop_plz')->nullable(false)->default('')->change();
            $table->string('prop_ort')->nullable(false)->default('')->change();
            $table->string('rent')->nullable(false)->default('')->change();
            $table->string('rent_beginn')->nullable(false)->default('')->change();
            $table->string('lessor_type')->nullable(false)->default('')->change();
            $table->string('lessor_name')->nullable(false)->default('')->change();
            $table->string('lessor_contact')->nullable(false)->default('')->change();
            $table->string('lessor_phone')->nullable(false)->default('')->change();
            $table->string('lessor_adress')->nullable(false)->default('')->change();
            $table->string('lessor_plz')->nullable(false)->default('')->change();
            $table->string('lessor_ort')->nullable(false)->default('')->change();
            $table->string('house_owner_name')->nullable(false)->default('')->change();
            $table->string('house_owner_address')->nullable(false)->default('')->change();
            $table->string('house_owner_plz')->nullable(false)->default('')->change();
            $table->string('house_owner_city')->nullable(false)->default('')->change();
           
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
            $table->string('prop_adress')->nullable()->default(NULL)->change();
            $table->string('prop_plz')->nullable()->default(NULL)->change();
            $table->string('prop_ort')->nullable()->default(NULL)->change();
            $table->string('rent')->nullable()->default(NULL)->change();
            $table->string('rent_beginn')->nullable()->default(NULL)->change();
            $table->string('lessor_type')->nullable()->default(NULL)->change();
            $table->string('lessor_name')->nullable()->default(NULL)->change();
            $table->string('lessor_contact')->nullable()->default(NULL)->change();
            $table->string('lessor_phone')->nullable()->default(NULL)->change();
            $table->string('lessor_adress')->nullable()->default(NULL)->change();
            $table->string('lessor_plz')->nullable()->default(NULL)->change();
            $table->string('lessor_ort')->nullable()->default(NULL)->change();
            $table->string('house_owner_name')->nullable()->default(NULL)->change();
            $table->string('house_owner_address')->nullable()->default(NULL)->change();
            $table->string('house_owner_plz')->nullable()->default(NULL)->change();
            $table->string('house_owner_city')->nullable()->default(NULL)->change();
          
        });
    }
}
