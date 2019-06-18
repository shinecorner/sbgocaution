<?php

use Illuminate\Database\Seeder;

class BrokersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('brokers')->truncate();
        factory(App\Broker::class, 100)->create();
    }
}
