<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivateLandlordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_landlords', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('real_privatelandlord_num');
            $table->string('privatelandlord_num');
            $table->tinyInteger('is_duplicate')->default(0);
            $table->string('number');
            $table->string('salutation');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('contact_person');
            $table->text('address');
            $table->string('zip');
            $table->string('state');
            $table->string('city');
            $table->string('language');
            $table->string('country');
            $table->string('phone');
            $table->string('email');
            $table->string('website');
            $table->longText('notes');
            $table->string('fax');
            $table->tinyInteger('policy_comment_notification');
            $table->tinyInteger('damage_comment_notification');
            $table->string('payment_recipient_bank');
            $table->string('payment_recipient_iban');
            $table->string('payment_recipient_post_account');
            $table->tinyInteger('certificate_email')->default(1);
            $table->text('file_names');
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
        Schema::dropIfExists('private_landlords');
    }
}
