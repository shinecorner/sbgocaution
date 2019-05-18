<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('invoice_id');
             $table->foreign('invoice_id')->references('id')->on('invoices');
             $table->string('type');
             $table->string('reason');
             $table->dateTime('datetime');
             $table->string('status');
             $table->string('payment_type');
             $table->string('value');
             $table->string('documents');
             $table->dateTime('from_datetime');
             $table->dateTime('to_datetime');
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
        Schema::dropIfExists('refunds');
    }
}
