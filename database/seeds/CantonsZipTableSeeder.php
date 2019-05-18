<?php

use Illuminate\Database\Seeder;

class CantonsZipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('cantons_zip')->truncate();
        DB::unprepared(file_get_contents(database_path('cantons_zip.sql')));
        Schema::enableForeignKeyConstraints();
    }
}
