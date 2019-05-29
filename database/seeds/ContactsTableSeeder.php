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
        DB::table('policies')->truncate();
        DB::table('invoices')->truncate();
	    factory(App\Contact::class, 100)->create()->each(function ($contact) {
            $contact->addresses()->save(factory(App\Address::class)->create());
            for($i = mt_rand(1,6); $i < 6; $i++){
                $policy = factory(App\Policy::class)->create();
                $policy_address = factory(App\PolicyAddress::class)->create();
                $policy->policy_address()->save($policy_address);
                $contact->policies()->save($policy); 
                $policy->invoices()->save(factory(App\Invoice::class)->create());
            }
        });
        Schema::enableForeignKeyConstraints();
    }
}
