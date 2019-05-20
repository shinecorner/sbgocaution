<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsCertificationamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('certificationam', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'certificationam MODIFY sendcertificate_start TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'certificationam MODIFY sendcertificate_finish TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'certificationam MODIFY sendcertificate_eop_start TINYINT(1)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'certificationam MODIFY sendcertificate_eop_finish TINYINT(1)');
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
        Schema::table('certificationam', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'certificationam MODIFY sendcertificate_start TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'certificationam MODIFY sendcertificate_finish TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'certificationam MODIFY sendcertificate_eop_start TINYINT');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'certificationam MODIFY sendcertificate_eop_finish TINYINT');
        });
        Schema::enableForeignKeyConstraints();
    }
}
