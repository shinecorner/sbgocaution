<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumns1ContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('contacts', function (Blueprint $table) {
            DB::table('contacts')->update([
                'garant_total' => 1,
                'additional_id' => 1,
                'promo_success' => 1,
                'promo_review' => 1,
                'promo_review_facebook' => 1,
                'promo_review_google' => 1,
                'promo_review_local' => 1
            ]);
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'contacts MODIFY contact_type TINYINT(1) NOT NULL DEFAULT 1');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'contacts MODIFY garant_total TINYINT(1) DEFAULT 1');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'contacts MODIFY additional_id INT(11) NOT NULL DEFAULT 1');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'contacts MODIFY promo_success TINYINT(1) NOT NULL DEFAULT 1');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'contacts MODIFY promo_review TINYINT(1) NOT NULL DEFAULT 1');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'contacts MODIFY promo_review_facebook TINYINT(1) NOT NULL DEFAULT 1');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'contacts MODIFY promo_review_google TINYINT(1) NOT NULL DEFAULT 1');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'contacts MODIFY promo_review_local TINYINT(1) NOT NULL DEFAULT 1');
            $table->boolean('preconfirmation_type')->default(1);
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
        Schema::table('contacts', function (Blueprint $table) {
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'contacts MODIFY contact_type INTEGER NOT NULL DEFAULT 1');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'contacts MODIFY garant_total INTEGER NOT NULL DEFAULT 1');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'contacts MODIFY additional_id INTEGER NOT NULL DEFAULT 1');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'contacts MODIFY promo_success INTEGER NOT NULL DEFAULT 1');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'contacts MODIFY promo_review INTEGER NOT NULL DEFAULT 1');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'contacts MODIFY promo_review_facebook INTEGER NOT NULL DEFAULT 1');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'contacts MODIFY promo_review_google INTEGER NOT NULL DEFAULT 1');
            DB::statement('ALTER TABLE ' . DB::getTablePrefix() . 'contacts MODIFY promo_review_local INTEGER NOT NULL DEFAULT 1');
            $table->dropColumn('preconfirmation_type');
        });
        Schema::enableForeignKeyConstraints();
    }
}
