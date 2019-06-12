<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        Schema::enableForeignKeyConstraints();
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'contacts']);
        Permission::create(['name' => 'contacts_delete']);
        Permission::create(['name' => 'policies']);
        Permission::create(['name' => 'policies_delete']);
        Permission::create(['name' => 'invoices']);
        Permission::create(['name' => 'invoices_generali']);
        Permission::create(['name' => 'payments']);
        Permission::create(['name' => 'payments_delete']);
        Permission::create(['name' => 'refunds']);
        Permission::create(['name' => 'refunds_delete']);
        Permission::create(['name' => 'damages']);
        Permission::create(['name' => 'damages_delete']);
        Permission::create(['name' => 'additional_businesses']);
        Permission::create(['name' => 'additional_businesses_delete']);
        Permission::create(['name' => 'real_estate_companies']);
        Permission::create(['name' => 'real_estate_companies_delete']);
        Permission::create(['name' => 'employees']);
        Permission::create(['name' => 'employees_delete']);
        Permission::create(['name' => 'private_houseowners']);
        Permission::create(['name' => 'private_houseowners_delete']);
        Permission::create(['name' => 'business_houseowners']);
        Permission::create(['name' => 'business_houseowners_delete']);
        Permission::create(['name' => 'insurance_brokers']);
        Permission::create(['name' => 'insurance_brokers_delete']);
        Permission::create(['name' => 'call_center_contacts']);
        Permission::create(['name' => 'call_center_contacts_delete']);
        Permission::create(['name' => 'templates']);
        Permission::create(['name' => 'templates_delete']);
        Permission::create(['name' => 'customer']);
        Permission::create(['name' => 'landlord']);

        // create roles and assign created permissions
		Role::create(['name' => 'super-users']);
        Role::create(['name' => 'squad']);
        Role::create(['name' => 'collection-department']);
        Role::create(['name' => 'back-office-staff']);
        Role::create(['name' => 'landlords']);
        Role::create(['name' => 'customers']);

    }
}
