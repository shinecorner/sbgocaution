<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->truncate();
        factory(App\User::class, 8)->create()->each(function ($user) {
            $role = Role::findByName('super-users', 'api');
            $user->assignRole($role);
        });
    }
}
