<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDamageDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damage_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('damage_id');
            $table->string('document');
            $table->integer('type');
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
        Schema::dropIfExists('damage_documents');
    }
}
