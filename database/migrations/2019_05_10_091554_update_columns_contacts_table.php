<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
           $table->string('real_contact_num')->nullable(false)->default('')->change();
           $table->string('contact_formate')->nullable(false)->default('')->change();
           $table->string('nachname')->nullable(false)->default('')->change();
           $table->string('vorname')->nullable(false)->default('')->change();
           $table->string('language')->nullable(false)->default('')->change();
           $table->string('email')->nullable(false)->default('')->change();
           $table->string('telefon')->nullable(false)->default('')->change();
           $table->string('mobile')->nullable(false)->default('')->change();
           $table->string('birthday')->nullable(false)->default('')->change();
           $table->string('nation')->nullable(false)->default('')->change();
           $table->string('residence_card_questios')->nullable(false)->default('')->change();
           $table->string('deposit_amount')->nullable(false)->default('')->change();
           $table->string('rc_active')->nullable(false)->default('')->change();
           $table->string('rc_company')->nullable(false)->default('')->change();
           $table->string('rc_quote')->nullable(false)->default('')->change();
           $table->string('pay_options')->nullable(false)->default('')->change();
           $table->string('garant_total')->nullable(false)->default('')->change();
           $table->string('co_options')->nullable(false)->change();
           $table->string('betreibungen')->nullable(false)->default('')->change();
           $table->string('message')->nullable(false)->default('')->change();
           $table->string('client_notice')->nullable(false)->default('')->change();
           $table->string('ip_user')->nullable(false)->default('')->change();
           $table->string('file_business')->nullable(false)->default('')->change();
           $table->string('additional_id')->nullable(false)->default('')->change();
           $table->string('scan_file_name')->nullable(false)->default('')->change();
           $table->string('offer_type')->nullable(false)->default('')->change();
           $table->string('file_name')->nullable(false)->default('')->change();
           $table->string('Send_Offer_By')->nullable(false)->default('')->change();
           $table->string('iban')->nullable(false)->default('')->change();
           $table->string('promo_code')->nullable(false)->default('')->change();
           $table->string('reg_type')->nullable(false)->default('')->change();
           $table->string('serverinfo')->nullable(false)->default('')->change();
           $table->string('mygocaution_username')->nullable(false)->default('')->change();
           $table->string('mygocaution_password')->nullable(false)->default('')->change();
           $table->string('existing_customer_gocaution')->nullable(false)->default('')->change();
           $table->string('nation_sub_question')->nullable(false)->default('')->change();
           $table->string('promo_success')->nullable(false)->default('')->change();
           $table->string('promo_review')->nullable(false)->default('')->change();
           $table->string('promo_review_facebook')->nullable(false)->default('')->change();
           $table->string('promo_review_google')->nullable(false)->default('')->change();
           $table->string('promo_review_local')->nullable(false)->default('')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('real_contact_num')->nullable()->default(NULL)->change();
            $table->string('contact_formate')->nullable()->default(NULL)->change();
            $table->string('nachname')->nullable()->default(NULL)->change();
            $table->string('vorname')->nullable()->default(NULL)->change();
            $table->string('language')->nullable()->default(NULL)->change();
            $table->string('email')->nullable()->default(NULL)->change();
            $table->string('telefon')->nullable()->default(NULL)->change();
            $table->string('mobile')->nullable()->default(NULL)->change();
            $table->string('birthday')->nullable()->default(NULL)->change();
            $table->string('nation')->nullable()->default(NULL)->change();
            $table->string('residence_card_questios')->nullable()->default(NULL)->change();
            $table->string('deposit_amount')->nullable()->default(NULL)->change();
            $table->string('rc_active')->nullable()->default(NULL)->change();
            $table->string('rc_company')->nullable()->default(NULL)->change();
            $table->string('rc_quote')->nullable()->default(NULL)->change();
            $table->string('pay_options')->nullable()->default(NULL)->change();
            $table->string('garant_total')->nullable()->default(NULL)->change();
            $table->string('co_options')->nullable()->change();
            $table->string('betreibungen')->nullable()->default(NULL)->change();
            $table->string('message')->nullable()->default(NULL)->change();
            $table->string('client_notice')->nullable()->default(NULL)->change();
            $table->string('ip_user')->nullable()->default(NULL)->change();
            $table->string('file_business')->nullable()->default(NULL)->change();
            $table->string('additional_id')->nullable()->default(NULL)->change();
            $table->string('scan_file_name')->nullable()->default(NULL)->change();
            $table->string('offer_type')->nullable()->default(NULL)->change();
            $table->string('file_name')->nullable()->default(NULL)->change();
            $table->string('Send_Offer_By')->nullable()->default(NULL)->change();
            $table->string('iban')->nullable()->default(NULL)->change();
            $table->string('promo_code')->nullable()->default(NULL)->change();
            $table->string('reg_type')->nullable()->default(NULL)->change();
            $table->string('serverinfo')->nullable()->default(NULL)->change();
            $table->string('mygocaution_username')->nullable()->default(NULL)->change();
            $table->string('mygocaution_password')->nullable()->default(NULL)->change();
            $table->string('existing_customer_gocaution')->nullable()->default(NULL)->change();
            $table->string('nation_sub_question')->nullable()->default(NULL)->change();
            $table->string('promo_success')->nullable()->default(NULL)->change();
            $table->string('promo_review')->nullable()->default(NULL)->change();
            $table->string('promo_review_facebook')->nullable()->default(NULL)->change();
            $table->string('promo_review_google')->nullable()->default(NULL)->change();
            $table->string('promo_review_local')->nullable()->default(NULL)->change();
        });
    }
}
