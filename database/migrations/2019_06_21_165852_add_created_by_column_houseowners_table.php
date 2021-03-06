<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedByColumnHouseownersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('house_owners', function (Blueprint $table) {
            $table->integer('created_by')->default(0)->after('is_duplicate');
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
        Schema::table('house_owners', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });
        Schema::enableForeignKeyConstraints();
    }
}
