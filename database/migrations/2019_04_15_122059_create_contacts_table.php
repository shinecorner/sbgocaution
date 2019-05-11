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
			$table->integer('id', true);
			$table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('real_contact_num');
			$table->integer('user_id')->index('user_id');
			$table->string('contact_formate');
			$table->integer('contact_type')->default(1);
			$table->string('status', 50)->default('new');
			$table->string('anrede')->default('mr');
			$table->string('nachname');
			$table->string('vorname');
			$table->string('language');
			$table->string('email')->index('email')->nullable();
			$table->string('telefon')->nullable();
			$table->string('mobile')->nullable();
			$table->string('birthday', 150)->nullable();
			$table->string('nation')->nullable();
			$table->string('residence_card_questios', 80)->nullable();
			$table->string('deposit_amount')->nullable();
			$table->string('rc_active', 30)->nullable();
			$table->string('rc_company')->nullable();
			$table->string('rc_quote', 30);
			$table->string('pay_options', 100)->nullable();
			$table->integer('garant_total')->nullable();
			$table->string('co_options', 50)->default('email')->nullable();
			$table->string('betreibungen')->nullable();
			$table->string('lead_source', 200)->default('Online Registrierung');
			$table->text('message', 16777215)->nullable();
			$table->text('client_notice')->nullable();
			$table->string('ip_user', 100)->nullable();
			$table->string('company_type')->nullable();
			$table->string('company_branche')->nullable();
			$table->string('company_name')->nullable();
			$table->string('company_zip')->nullable();
			$table->text('company_address', 65535)->nullable();
			$table->string('company_city')->nullable();
			$table->string('company_phone')->nullable();
			$table->string('company_website')->nullable();
			$table->string('company_mail')->nullable();
			$table->string('file_business')->nullable();
			$table->integer('additional_id')->nullable();
			$table->boolean('is_duplicate')->default(0);
			$table->text('scan_file_name', 65535)->nullable();
			$table->integer('offer_type')->nullable();
			$table->string('file_name')->nullable();
			$table->string('Send_Offer_By', 20)->nullable();
			$table->string('iban', 150)->nullable();
			$table->string('promo_code', 150)->nullable();
			$table->string('reg_type')->nullable();
			$table->string('serverinfo', 250)->nullable();
			$table->string('mygocaution_username', 256)->nullable();
			$table->string('mygocaution_password', 256)->nullable();
			$table->string('existing_customer_gocaution', 10)->nullable();
			$table->string('nation_sub_question', 10)->nullable();
			$table->boolean('promo_success')->index('promo_success')->nullable();
			$table->boolean('promo_review')->nullable();
			$table->boolean('promo_review_facebook')->nullable();
			$table->boolean('promo_review_google')->nullable();
			$table->boolean('promo_review_local')->nullable();
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
		Schema::drop('contacts');
	}

}
