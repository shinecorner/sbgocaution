<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnsRealestateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('realestate_agencies', function(Blueprint $table) {
          $table->renameColumn('lattitude', 'latitude');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('stnk', function(Blueprint $table) {
          $table->renameColumn('latitude', 'lattitude');
      });
    }
}
