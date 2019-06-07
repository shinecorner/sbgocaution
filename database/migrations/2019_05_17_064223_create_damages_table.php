<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDamagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('policy_id')->unsigned();
            $table->foreign('policy_id')->references('id')->on('policies');
            $table->string('damage_id');
            $table->string('status');
            $table->datetime('notification_date');
            $table->datetime('received_on');
            $table->tinyInteger('send_to_generali');
            $table->datetime('send_to_generali_date');
            $table->string('paid_amount');
            $table->tinyInteger('generali_paid');
            $table->datetime('paid_date');
            $table->string('upload_doc');
            $table->text('notice');
            $table->string('username');
            $table->integer('user_id');
            $table->integer('partner_user_id');
            $table->tinyInteger('special_case')->default(0);
            $table->tinyInteger('damage_recall');
            $table->decimal('regress_amount',10,2);
            $table->string('payment_recipient_name');
            $table->string('payment_recipient_address');
            $table->string('payment_recipient_zip');
            $table->string('payment_recipient_city');
            $table->string('payment_recipient_bank');
            $table->string('payment_recipient_iban');
            $table->string('payment_recipient_reference');
            $table->string('payment_recipient_post_account');
            $table->string('payment_payout');
            $table->string('pending_documents');
            $table->tinyInteger('signed_form');
            $table->string('status_recovery');
            $table->datetime('termination_date');
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
        Schema::dropIfExists('damages');
    }
}
