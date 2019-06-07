<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('countries')->truncate();
        DB::unprepared(file_get_contents(database_path('country.sql')));
        Schema::enableForeignKeyConstraints();
    }
}
