<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnsInvoicesTable extends Migration
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
            $table->dropColumn('duedate');
            $table->dropColumn('rec_nextdate');
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
            $table->datetime('duedate')->after('discount');
            $table->date('rec_nextdate')->after('enddate');
        });
        Schema::enableForeignKeyConstraints();
    }
}
