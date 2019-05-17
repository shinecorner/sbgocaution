<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_num');
            $table->integer('realestate_agency_id');
            $table->integer('real_employee_num');
            $table->integer('user_id');
            $table->string('title',200);
            $table->string('salutation',50);
            $table->string('last_name');
            $table->string('first_name');
            $table->string('email');
            $table->string('number');
            $table->string('phone');
            $table->longText('notes');
            $table->tinyInteger('sent_flyer');
            $table->tinyInteger('is_duplicate')->default(0);
            $table->tinyInteger('receive_notification')->default(1);
            $table->string('partner_username');
            $table->string('partner_password');
            $table->string('status',50);
            $table->tinyInteger('policy_comment_notification')->default(1);
            $table->tinyInteger('damage_comment_notification')->default(1);
            $table->tinyInteger('mass_email_sent');
            $table->dateTime('mass_email_sent_time');
            $table->tinyInteger('newpolicy_email_notification')->default(1);
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
        Schema::dropIfExists('employees');
    }
}
