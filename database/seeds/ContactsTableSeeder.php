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
        DB::table('garants')->truncate();
        DB::table('policies')->truncate();
        DB::table('invoices')->truncate();
        DB::table('addresses')->truncate();
        DB::table('contacts_companies')->truncate();
        DB::table('contacts')->truncate();
	    factory(App\Contact::class, 100)->create()->each(function ($contact) {
            $contact->addresses()->save(factory(App\Address::class)->create());

            if($contact->contact_type == 2) {
                $contact->companies()->save(factory(App\ContactCompany::class)->create());
            }

            for($i = mt_rand(1,6); $i < 6; $i++) {
                $policy = factory(App\Policy::class)->create();
                $policy_address = factory(App\PolicyAddress::class)->create();
                $policy->policy_address()->save($policy_address);
                for($j = mt_rand(1,3); $j <= 3; $j++) {
                    $garant = factory(App\Garant::class)->create();
                    $policy->garants()->save($garant);
                }
                $invoice = factory(App\Invoice::class)->create();
                $invoice->computed_total = $policy->computed_total;
                $invoice->save();
                $policy->invoices()->save($invoice);
                $contact->policies()->save($policy); 
            }

        });
        Schema::enableForeignKeyConstraints();
    }
}
