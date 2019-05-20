<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsPrivateLandlordsTable extends Migration
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
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'private_landlords MODIFY is_duplicate TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'private_landlords MODIFY policy_comment_notification TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'private_landlords MODIFY damage_comment_notification TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'private_landlords MODIFY certificate_email TINYINT(1)');
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
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'private_landlords MODIFY is_duplicate TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'private_landlords MODIFY policy_comment_notification TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'private_landlords MODIFY damage_comment_notification TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'private_landlords MODIFY certificate_email TINYINT');
        });
        Schema::enableForeignKeyConstraints();
    }
}
