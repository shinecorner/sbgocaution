<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDamagesDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damages_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('damage_id')->unsigned();
            $table->foreign('damage_id')->references('id')->on('damages');
            $table->string('document');
            $table->integer('type')->default(1);
            $table->integer('internal');
            $table->integer('user_id');
            $table->string('partner_user');
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
        Schema::dropIfExists('damages_documents');
    }
}
