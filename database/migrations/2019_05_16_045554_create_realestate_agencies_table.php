<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealestateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realestate_agencies', function (Blueprint $table) {
          $table->collation = 'utf8mb4_unicode_ci';
          $table->charset = 'utf8mb4';
          $table->increments('id');
          $table->integer('real_realestate_agency_num');
          $table->integer('user_id');
          $table->integer('created_by');
          $table->boolean('is_duplicate')->default(0);
          $table->string('realestate_agency_num',255);
          $table->string('number',255);
          $table->string('status',255)->default('not_contacted');
          $table->string('name',255);
          $table->text('address');
          $table->string('zip',255);
          $table->string('city',255);
          $table->string('lattitude',50);
          $table->string('longitude',50);
          $table->string('state',255);
          $table->string('country',255);
          $table->string('phone',255);
          $table->string('phone2',255);
          $table->string('fax',255);
          $table->string('email',255);
          $table->string('website',255);
          $table->string('language',100);
          $table->boolean('region');
          $table->string('inter1',255);
          $table->string('inter2',255);
          $table->string('inter3',255);
          $table->string('contact_person_1',200);
          $table->string('contact_person_2',200);
          $table->string('contact_person_3',200);
          $table->string('crediweb_username_old',255);
          $table->string('crediweb_password_old',255);
          $table->string('status_contract',255);
          $table->longText('notes');
          $table->string('partner_username',150);
          $table->string('partner_password',150);
          $table->string('contact_person_1_anrede',50);
          $table->string('contact_person_1_nachname',60);
          $table->string('contact_person_1_vorname',50);
          $table->string('contact_person_2_nachname',50);
          $table->string('contact_person_2_vorname',50);
          $table->string('contact_person_3_nachname',50);
          $table->string('contact_person_3_vorname',50);
          $table->string('contact_person_2_anrede',5);
          $table->string('contact_person_3_anrede',5);
          $table->string('contact_person_1_position',70);
          $table->string('contact_person_2_position',70);
          $table->string('contact_person_3_position',70);
          $table->integer('key_account_manager');
          $table->boolean('quote_comment_notification')->default(1);
          $table->boolean('damage_comment_notification')->default(1);
          $table->boolean('certificate_email')->default(1);
          $table->string('payment_recipient_bank',255);
          $table->string('payment_recipient_iban',255);
          $table->string('payment_recipient_post_account',255);
          $table->string('child_realestate_agencies',255);
          $table->text('scan_file_name');
          $table->boolean('mass_email_sent');
          $table->dateTime('mass_email_sent_time');
          $table->boolean('newpolicy_email_notification')->default(1);
          $table->boolean('hoacception')->default(0);
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
        Schema::dropIfExists('realestate_agencies');
    }
}
