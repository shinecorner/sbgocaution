<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('passport:install');
        $this->call(ConfigsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
    }
}
