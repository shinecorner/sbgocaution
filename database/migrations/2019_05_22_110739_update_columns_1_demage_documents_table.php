<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumns1DemageDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('damages_documents', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'damages_documents DROP FOREIGN KEY damages_documents_damage_id_foreign');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'damages_documents MODIFY damage_id INT(11)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'damages_documents ADD CONSTRAINT damages_documents_damage_id_foreign FOREIGN KEY ( damage_id ) REFERENCES damages ( id )');
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
        Schema::table('damages_documents', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'damages_documents DROP FOREIGN KEY damages_documents_damage_id_foreign');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'damages_documents MODIFY damage_id INT(10)');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'damages_documents ADD CONSTRAINT damages_documents_damage_id_foreign FOREIGN KEY ( damage_id ) REFERENCES damages ( id )');
        });
        Schema::enableForeignKeyConstraints();
    }
}
