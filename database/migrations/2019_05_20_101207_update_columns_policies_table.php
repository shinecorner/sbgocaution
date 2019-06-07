<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsPoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('policies', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'policies MODIFY cancel_option TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'policies MODIFY delay_reminder TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'policies MODIFY headquarter TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'policies MODIFY cn_in_year TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'policies MODIFY paid_rent_regular TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'policies MODIFY generali_paid TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'policies MODIFY signed_form_received TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'policies MODIFY created_from_login TINYINT(1)');
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
        Schema::table('policies', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'policies MODIFY cancel_option TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'policies MODIFY delay_reminder TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'policies MODIFY headquarter TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'policies MODIFY cn_in_year TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'policies MODIFY paid_rent_regular TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'policies MODIFY generali_paid TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'policies MODIFY signed_form_received TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'policies MODIFY created_from_login TINYINT');
        });
        Schema::enableForeignKeyConstraints();
    }
}
