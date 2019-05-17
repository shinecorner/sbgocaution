<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebtCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debt_collections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id');
            $table->tinyInteger('answer')->default(0);
            $table->date('paid_date');
            $table->string('ref_num');
            $table->string('lost_certificate_ref_num');
            $table->tinyInteger('paid')->default(0);
            $table->integer('debt_office_id')->default(0);
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
        Schema::dropIfExists('debt_collections');
    }
}
