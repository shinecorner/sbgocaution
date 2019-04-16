<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('real_contact_num');
			$table->integer('id', true);
			$table->integer('user_id')->index('user_id');
			$table->string('contact_formate');
			$table->integer('contact_type')->default(1);
			$table->string('status', 50)->default('new');
			$table->string('anrede')->default('mr');
			$table->string('nachname');
			$table->string('vorname');
			$table->string('name1');
			$table->string('language');
			$table->text('address', 65535);
			$table->string('plz');
			$table->string('ort', 155);
			$table->string('email')->index('email');
			$table->string('telefon');
			$table->string('mobile');
			$table->string('birthday', 150);
			$table->string('nation');
			$table->string('residence_card_questios', 80);
			$table->string('prop_adress');
			$table->string('prop_plz');
			$table->string('prop_ort');
			$table->string('rent_beginn');
			$table->string('deposit_amount');
			$table->string('rent');
			$table->string('lessor_type');
			$table->string('lessor_name');
			$table->string('lessor_contact');
			$table->string('lessor_phone');
			$table->string('lessor_adress');
			$table->string('lessor_plz');
			$table->string('lessor_ort');
			$table->string('house_owner_name');
			$table->string('house_owner_address');
			$table->string('house_owner_plz');
			$table->string('house_owner_city');
			$table->string('rc_active', 30);
			$table->string('rc_company');
			$table->string('rc_quote', 30);
			$table->string('pay_options', 100);
			$table->integer('garant_total');
			$table->string('co_options', 50)->default('email');
			$table->string('betreibungen');
			$table->string('lead_source', 200)->default('Online Registrierung');
			$table->text('message', 16777215);
			$table->text('contact_notes');
			$table->text('client_notice');
			$table->string('ip_user', 100);
			$table->string('company_type');
			$table->string('company_branche');
			$table->string('company_name');
			$table->string('company_zip');
			$table->text('company_address', 65535);
			$table->string('company_city');
			$table->string('company_phone');
			$table->string('company_website');
			$table->string('company_mail');
			$table->string('file_business');
			$table->integer('additional_id');
			$table->boolean('is_duplicate')->default(0);
			$table->text('scan_file_name', 65535);
			$table->text('preconfirmation_file_name', 65535);
			$table->integer('preconfirmation_type');
			$table->text('preconfirmation_sent', 65535);
			$table->date('preconfirmation_sent_date');
			$table->boolean('preconfirmation_reminder_sent');
			$table->integer('offer_type');
			$table->text('offer_file_name', 65535);
			$table->text('offer_sent', 16777215);
			$table->string('file_name');
			$table->string('Send_Offer_By', 20);
			$table->string('iban', 150);
			$table->string('promo_code', 150);
			$table->string('reg_type');
			$table->string('vatid');
			$table->string('serverinfo', 250);
			$table->string('mygocaution_username', 256);
			$table->string('mygocaution_password', 256);
			$table->string('existing_customer_gocaution', 10);
			$table->string('nation_sub_question', 10);
			$table->boolean('promo_success')->index('promo_success');
			$table->boolean('promo_review');
			$table->boolean('promo_review_facebook');
			$table->boolean('promo_review_google');
			$table->boolean('promo_review_local');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contacts');
	}

}
