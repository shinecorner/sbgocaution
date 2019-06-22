<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedByColumnPrivatelandlordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('private_landlords', function (Blueprint $table) {
            $table->integer('created_by')->default(0)->after('file_names');
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
        Schema::table('private_landlords', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });
        Schema::enableForeignKeyConstraints();
    }
}
