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
        DB::table('realestate_agencies')->truncate();
        DB::table('garants')->truncate();
        DB::table('brokers')->truncate();
        DB::table('house_owners')->truncate();
        DB::table('private_landlords')->truncate();
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

            for($i = mt_rand(1,6); $i <= 6; $i++) {
                $policy = factory(App\Policy::class)->create();
                if($i == 1 || $i == 2) {
                    $broker = factory(App\Broker::class)->create();
                    $broker->policies()->save($policy);
                } else if($i == 3 || $i == 4) {
                    $private_landlord = factory(App\PrivateLandlord::class)->create();
                    $private_landlord->policies()->save($policy);
                } else {
                    $realestateAgency = factory(App\RealestateAgency::class)->create();
                    $realestateAgency->policies()->save($policy);
                    $houseOwner = factory(App\HouseOwner::class)->create();
                    $houseOwner->policies()->save($policy);
                }
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
