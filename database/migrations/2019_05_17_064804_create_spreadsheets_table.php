<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpreadsheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spreadsheets', function (Blueprint $table) {
            $table->increments('id');        
            $table->string('policy_num');
            $table->integer('policy_id');
            $table->string('unique_number');
            $table->string('start_date');
            $table->string('report_mmdd');
            $table->integer('invoice_id');
            $table->string('nachname');
            $table->string('vorname');
            $table->string('full_name');
            $table->string('ort');
            $table->string('deposit_amount',10,2);
            $table->decimal('net_premium',10,2);
            $table->decimal('stamp_duty',10,2);
            $table->decimal('total_premium',10,2);
            $table->decimal('premium_gocaution',10,2);
            $table->decimal('premium_generali',10,2);
            $table->decimal('stamp_duty2',10,2);
            $table->decimal('total_generali',10,2);
            $table->tinyInteger('old_type_customer');
            $table->string('unique_number2');
            $table->string('start_date2');
            $table->string('old_invoice_id');
            $table->tinyInteger('pass_duplicate_policy');
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
        Schema::dropIfExists('spreadsheets');
    }
}
