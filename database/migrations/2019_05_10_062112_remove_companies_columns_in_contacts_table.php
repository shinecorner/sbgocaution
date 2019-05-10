<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveCompaniesColumnsInContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('company_type');
            $table->dropColumn('company_branche');
            $table->dropColumn('company_name');
            $table->dropColumn('company_zip');
            $table->dropColumn('company_address');
            $table->dropColumn('company_city');
            $table->dropColumn('company_phone');
            $table->dropColumn('company_website');
            $table->dropColumn('company_mail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('company_type')->nullable();
            $table->string('company_branche')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_zip')->nullable();
            $table->text('company_address', 65535)->nullable();
            $table->string('company_city')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_mail')->nullable();
        });
    }
}
