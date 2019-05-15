<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsAddressesTable extends Migration
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
            $table->integer('contact_id')->nullable(false)->default(0)->change();
            $table->string('co_address_name')->nullable(false)->default('')->change();
            $table->string('address')->nullable(false)->default('')->change();
            $table->string('plz')->nullable(false)->default('')->change();
            $table->string('state')->nullable(false)->default('')->change();
            $table->string('ort')->nullable(false)->default('')->change();
            $table->string('comment')->nullable(false)->default('')->change();
            $table->string('ordering')->nullable(false)->change();
            $table->string('from_partner')->nullable(false)->default('')->change();
            $table->string('old_cn')->nullable(false)->default('')->change();
            $table->string('not_correct')->nullable(false)->default('')->change();
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
            $table->integer('contact_id')->nullable()->default(NULL)->change();
            $table->string('co_address_name')->nullable()->default(NULL)->change();
            $table->string('address')->nullable()->default(NULL)->change();
            $table->string('plz')->nullable()->default(NULL)->change();
            $table->string('state')->nullable()->default(NULL)->change();
            $table->string('ort')->nullable()->default(NULL)->change();
            $table->string('comment')->nullable()->default(NULL)->change();
            $table->string('ordering')->nullable()->change();
            $table->string('from_partner')->nullable()->default(NULL)->change();
            $table->string('old_cn')->nullable()->default(NULL)->change();
            $table->string('not_correct')->nullable()->default(NULL)->change();
        });
        Schema::enableForeignKeyConstraints();
    }
}
