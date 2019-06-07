<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('employees', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'employees MODIFY sent_flyer TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'employees MODIFY is_duplicate TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'employees MODIFY receive_notification TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'employees MODIFY policy_comment_notification TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'employees MODIFY damage_comment_notification TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'employees MODIFY mass_email_sent TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'employees MODIFY newpolicy_email_notification TINYINT(1)');
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
        Schema::table('employees', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'employees MODIFY sent_flyer TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'employees MODIFY is_duplicate TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'employees MODIFY receive_notification TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'employees MODIFY policy_comment_notification TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'employees MODIFY damage_comment_notification TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'employees MODIFY mass_email_sent TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'employees MODIFY newpolicy_email_notification TINYINT');
        });
        Schema::enableForeignKeyConstraints();
    }
}
