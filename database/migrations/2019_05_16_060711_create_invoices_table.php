<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('policy_id');
            $table->string('invoice_num');
            $table->integer('real_invoice_num');
            $table->integer('contact_id');
            $table->datetime('added');
            $table->decimal('computed_total',12,2);
            $table->string('status');
            $table->integer('type')->default(1);
            $table->datetime('date');
            $table->date('startdate');
            $table->date('enddate');
            $table->date('rec_nextdate');
            $table->tinyInteger('is_recurrent');
            $table->tinyInteger('rec_email');
            $table->integer('rec_year');
            $table->integer('rec_month');
            $table->integer('rec_day');
            $table->integer('rec_count')->default(0);
            $table->tinyInteger('reminder_status')->default(0);
            $table->tinyInteger('sent_reminder');
            $table->date('sent_reminder_date');
            $table->tinyInteger('sent_warning1');
            $table->date('sent_warning1_date');
            $table->tinyInteger('sent_warning2');
            $table->date('sent_warning2_date');
            $table->tinyInteger('sent_collection');
            $table->date('sent_collection_date');
            $table->tinyInteger('sent_command');
            $table->date('sent_command_date');
            $table->tinyInteger('special_time_allowance');
            $table->integer('template_id');
            $table->decimal('discount',12,4);
            $table->datetime('duedate');
            $table->string('auth_code');
            $table->datetime('last_sent');
            $table->text('send_details');
            $table->string('payment_type',200);
            $table->integer('created_by');
            $table->text('notes');
            $table->string('admin_notes');
            $table->integer('external_ref');
            $table->integer('from_num');
            $table->string('external_type');
            $table->tinyInteger('rec_pay_confirmemail_sent');
            $table->tinyInteger('corrected_email_sent');
            $table->tinyInteger('finalinvoice');
            $table->tinyInteger('transferred_discount');
            $table->integer('nextdiscount_item_id');
            $table->integer('debt_collection');
            $table->tinyInteger('generali_paid');
            $table->date('generali_paid_date');
            $table->date('generali_billing_from_date');
            $table->date('generali_billing_to_date');
            $table->date('paid_from_generali_date');
            $table->tinyInteger('paid_from_generali');
            $table->tinyInteger('minus_ct_mail_sent');
            $table->tinyInteger('certificationam');
            $table->timestamps();
            $table->index('invoice_num');
            $table->index('status');
            $table->index('type');
            $table->index('rec_count'); 
            $table->index('contact_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
