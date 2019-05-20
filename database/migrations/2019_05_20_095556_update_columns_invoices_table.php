<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('invoices', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY is_recurrent TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY reminder_status TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY sent_reminder TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY sent_warning1 TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY sent_warning2 TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY sent_collection TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY sent_command TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY special_time_allowance TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY rec_pay_confirmemail_sent TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY corrected_email_sent TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY finalinvoice TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY transferred_discount TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY generali_paid TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY paid_from_generali TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY minus_ct_mail_sent TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY certificationam TINYINT(1)');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('invoices', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY is_recurrent TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY reminder_status TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY sent_reminder TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY sent_warning1 TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY sent_warning2 TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY sent_collection TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY sent_command TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY special_time_allowance TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY rec_pay_confirmemail_sent TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY corrected_email_sent TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY finalinvoice TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY transferred_discount TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY generali_paid TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY paid_from_generali TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY minus_ct_mail_sent TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'invoices MODIFY certificationam TINYINT');
        });
        Schema::enableForeignKeyConstraints();
    }
}
