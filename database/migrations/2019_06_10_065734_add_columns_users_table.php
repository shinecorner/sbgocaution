<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->boolean('receive_system_emails')->default(1)->after('remember_token');
            $table->boolean('status')->default(1)->after('receive_system_emails');
            $table->string('phone')->default(' ')->after('status');
            $table->text('signature')->after('phone');
            $table->string('digital_signature')->after('signature');
            $table->date('birth_date')->default('0000-00-00')->after('digital_signature');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('receive_system_emails');
            $table->dropColumn('status');
            $table->dropColumn('phone');
            $table->dropColumn('signature');
            $table->dropColumn('digital_signature');
            $table->dropColumn('birth_date');
        });
    }
}
