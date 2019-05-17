<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificationamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificationam', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id');
            $table->tinyInteger('sendcertificate_start');
            $table->tinyInteger('sendcertificate_finish');
            $table->tinyInteger('sendcertificate_eop_start');
            $table->tinyInteger('sendcertificate_eop_finish');
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
        Schema::dropIfExists('certificationam');
    }
}
