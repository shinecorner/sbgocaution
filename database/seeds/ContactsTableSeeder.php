<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('contacts')->truncate();
	    factory(App\Contact::class, 20)->create()->each(function ($contact) {
                $contact->addresses()->save(factory(App\Address::class)->create());
            });
        Schema::enableForeignKeyConstraints();
    }
}
