<?php

use Illuminate\Database\Seeder;

class TemplatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('templates')->truncate();
        DB::unprepared(file_get_contents(database_path('templates.sql')));
        Schema::enableForeignKeyConstraints();
    }
}
