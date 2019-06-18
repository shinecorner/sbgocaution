<?php

use Illuminate\Database\Seeder;

class HouseOwnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('house_owners')->truncate();
        factory(App\HouseOwner::class, 100)->create();
    }
}
