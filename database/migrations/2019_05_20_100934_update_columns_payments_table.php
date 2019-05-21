<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('payments', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'payments MODIFY status TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'payments MODIFY debt_payment_type TINYINT(1)');
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
        Schema::table('payments', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'payments MODIFY status TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'payments MODIFY debt_payment_type TINYINT');
        });
        Schema::enableForeignKeyConstraints();
    }
}
