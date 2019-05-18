<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id');
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->string('interested_in');
            $table->string('status');
            $table->string('provider');
            $table->datetime('graduation_date');
            $table->string('expired_date');
            $table->string('commission_amount');
            $table->string('paid_on');
            $table->string('seller');
            $table->timestamp('added_on');
            $table->tinyInteger('emp_paid');
            $table->datetime('begin_date');
            $table->text('notice');
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
        Schema::dropIfExists('insurance_products');
    }
}
