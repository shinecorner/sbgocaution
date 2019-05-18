<?php

use Illuminate\Database\Seeder;

class CantonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('cantons')->truncate();
        DB::unprepared(file_get_contents(database_path('cantons.sql')));
        Schema::enableForeignKeyConstraints();
    }
}
