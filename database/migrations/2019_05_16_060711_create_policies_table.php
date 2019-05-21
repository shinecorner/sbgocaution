<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('policy_num');
            $table->integer('real_policy_num');
            $table->integer('contact_id');
            $table->decimal('computed_total',12,2);
            $table->string('status');
            $table->datetime('date');
            $table->date('startdate');
            $table->date('enddate');
            $table->string('auth_code');
            $table->datetime('last_sent');
            $table->mediumText('certificate_send_details');
            $table->datetime('last_sent_date_certificate');
            $table->integer('realestate_agency_id');
            $table->integer('employee_id');
            $table->integer('privatelandlord_id');
            $table->integer('houseowner_id');
            $table->integer('broker_id');
            $table->text('notes');
            $table->string('policy_type');
            $table->string('talked_to_landlord');
            $table->string('we_talk_to_landlord');
            $table->string('admin_notes');
            $table->integer('external_ref');
            $table->string('refund_doc');
            $table->integer('from_num');
            $table->string('organization_message');
            $table->tinyInteger('cancel_option')->default(0);
            $table->string('external_type');
            $table->tinyInteger('delay_reminder')->default(0);
            $table->tinyInteger('headquarter');
            $table->tinyInteger('cn_in_year');
            $table->integer('md_invoiceid');
            $table->string('sub_rent',10);
            $table->string('bank_name');
            $table->tinyInteger('paid_rent_regular');
            $table->string('existing_customer_quotestion1_sub',10);
            $table->string('existing_customer_quotestion1',10);
            $table->string('policy_at_other_provider');
            $table->tinyInteger('generali_paid');
            $table->tinyInteger('signed_form_received');
            $table->tinyInteger('created_from_login');
            $table->index('employee_id');
            $table->index('privatelandlord_id');
            $table->index('houseowner_id');
            $table->index('realestate_agency_id');
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
        Schema::dropIfExists('policies');
    }
}
