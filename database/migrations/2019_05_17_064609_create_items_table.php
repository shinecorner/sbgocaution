<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('invoice_id');
             $table->string('name');
             $table->string('description');
             $table->decimal('value',12,2);
             $table->decimal('amount',10,4);
             $table->decimal('discount',12,4);
             $table->integer('ordering');
             $table->decimal('tax',12,4);
             $table->string('external_type');
             $table->integer('product_id');
             $table->integer('policy_id');
             $table->tinyInteger('discount_type')->comment('1- Recurrent, 2- Instant');
             $table->tinyInteger('discount_reason');
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
        Schema::dropIfExists('items');
    }
}
