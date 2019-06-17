<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_owners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('realestate_agency_id');
            $table->string('name');
            $table->string('address');
            $table->string('zip',50);
            $table->string('city',100);
            $table->string('status');
            $table->string('email');
            $table->string('website');
            $table->string('phone');
            $table->string('fax');
            $table->string('payment_recipient_bank');
            $table->string('payment_recipient_iban');
            $table->string('payment_recipient_post_account');
            $table->tinyInteger('is_duplicate')->default(0);
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
        Schema::dropIfExists('house_owners');
    }
}
