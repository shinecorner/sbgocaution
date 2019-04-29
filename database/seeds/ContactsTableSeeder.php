<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    factory(App\Contact::class, 20000)->create()->each(function ($contact) {
                $contact->addresses()->save(factory(App\Address::class)->create());
            });
    }
}
