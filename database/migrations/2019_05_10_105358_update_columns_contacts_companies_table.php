<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsContactsCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts_companies', function (Blueprint $table) {
            $table->string('type')->nullable(false)->default('')->change();
            $table->string('branche')->nullable(false)->default('')->change();
            $table->string('name')->nullable(false)->default('')->change();
            $table->string('zip')->nullable(false)->default('')->change();
            $table->string('address')->nullable(false)->default('')->change();
            $table->string('city')->nullable(false)->default('')->change();
            $table->string('phone')->nullable(false)->default('')->change();
            $table->string('website')->nullable(false)->default('')->change();
            $table->string('mail')->nullable(false)->default('')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts_companies', function (Blueprint $table) {
            $table->string('type')->nullable()->default(NULL)->change();
            $table->string('branche')->nullable()->default(NULL)->change();
            $table->string('name')->nullable()->default(NULL)->change();
            $table->string('zip')->nullable()->default(NULL)->change();
            $table->string('address')->nullable()->default(NULL)->change();
            $table->string('city')->nullable()->default(NULL)->change();
            $table->string('phone')->nullable()->default(NULL)->change();
            $table->string('website')->nullable()->default(NULL)->change();
            $table->string('mail')->nullable()->default(NULL)->change();
        });
    }
}
