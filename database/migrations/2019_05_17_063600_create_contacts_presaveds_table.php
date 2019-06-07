<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsPresavedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_presaveds', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('ctype',['private','business'])->default('private');
            $table->enum('type',['save','autosave'])->default('save');
            $table->string('email');
            $table->text('meta');
            $table->string('pin',8);
            $table->string('token');
            $table->string('session_id');
            $table->tinyInteger('sent')->default(0);
            $table->string('ip',100);
            $table->tinyInteger('deleted');
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
        Schema::dropIfExists('contacts_presaveds');
    }
}
