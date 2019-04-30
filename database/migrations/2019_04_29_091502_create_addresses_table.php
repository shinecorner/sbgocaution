<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_primary');
            $table->tinyInteger('type')->default(1);
            $table->integer('contact_id')->nullable();
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->string('co_address_name')->nullable();
            $table->string('address')->nullable();
            $table->string('plz')->nullable();
            $table->string('state')->nullable();
            $table->string('ort')->nullable();
            $table->string('comment')->nullable();
            $table->integer('ordering')->default(0);
            $table->boolean('from_partner')->nullable();
            $table->string('old_cn')->nullable();
            $table->boolean('not_correct')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
