<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsContactsOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('contacts_offers', function (Blueprint $table) {
            $table->boolean('sent')->default(0)->change();
            $table->integer('sent_by')->default(0)->after('updated_at');
            $table->integer('created_by')->default(0)->after('created_at');
            $table->renameColumn('updated_at', 'sent_at');
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
        Schema::table('contacts_offers', function (Blueprint $table) {
            $table->string('sent')->change();
            $table->dropColumn('sent_by');
            $table->dropColumn('created_by');
            $table->renameColumn('sent_at', 'updated_at');
        });
        Schema::enableForeignKeyConstraints();
    }
}
