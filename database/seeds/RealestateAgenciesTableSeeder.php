<?php

use Illuminate\Database\Seeder;
use App\RealestateAgency;

class RealestateAgenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = factory(RealestateAgency::class, 2)->create();
    }
}
