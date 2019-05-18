<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id');
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->double('amount',11,2);
            $table->tinyInteger('status');
            $table->string('type');
            $table->dateTime('datetime');
            $table->dateTime('duedate');
            $table->mediumText('description');
            $table->text('details');
            $table->integer('ordering');
            $table->text('upload_doc');
            $table->text('postfinance_response');
            $table->tinyInteger('debt_payment_type');
            $table->string('card_type');
            $table->string('order_id');
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
        Schema::dropIfExists('payments');
    }
}
