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
        Permission::create(['guard_name' => 'api', 'name' => 'dashboard']);
        Permission::create(['guard_name' => 'api', 'name' => 'contacts']);
        Permission::create(['guard_name' => 'api', 'name' => 'contacts_delete']);
        Permission::create(['guard_name' => 'api', 'name' => 'policies']);
        Permission::create(['guard_name' => 'api', 'name' => 'policies_delete']);
        Permission::create(['guard_name' => 'api', 'name' => 'invoices']);
        Permission::create(['guard_name' => 'api', 'name' => 'invoices_generali']);
        Permission::create(['guard_name' => 'api', 'name' => 'payments']);
        Permission::create(['guard_name' => 'api', 'name' => 'payments_delete']);
        Permission::create(['guard_name' => 'api', 'name' => 'refunds']);
        Permission::create(['guard_name' => 'api', 'name' => 'refunds_delete']);
        Permission::create(['guard_name' => 'api', 'name' => 'damages']);
        Permission::create(['guard_name' => 'api', 'name' => 'damages_delete']);
        Permission::create(['guard_name' => 'api', 'name' => 'additional_businesses']);
        Permission::create(['guard_name' => 'api', 'name' => 'additional_businesses_delete']);
        Permission::create(['guard_name' => 'api', 'name' => 'real_estate_companies']);
        Permission::create(['guard_name' => 'api', 'name' => 'real_estate_companies_delete']);
        Permission::create(['guard_name' => 'api', 'name' => 'employees']);
        Permission::create(['guard_name' => 'api', 'name' => 'employees_delete']);
        Permission::create(['guard_name' => 'api', 'name' => 'private_houseowners']);
        Permission::create(['guard_name' => 'api', 'name' => 'private_houseowners_delete']);
        Permission::create(['guard_name' => 'api', 'name' => 'business_houseowners']);
        Permission::create(['guard_name' => 'api', 'name' => 'business_houseowners_delete']);
        Permission::create(['guard_name' => 'api', 'name' => 'insurance_brokers']);
        Permission::create(['guard_name' => 'api', 'name' => 'insurance_brokers_delete']);
        Permission::create(['guard_name' => 'api', 'name' => 'call_center_contacts']);
        Permission::create(['guard_name' => 'api', 'name' => 'call_center_contacts_delete']);
        Permission::create(['guard_name' => 'api', 'name' => 'templates']);
        Permission::create(['guard_name' => 'api', 'name' => 'templates_delete']);
        Permission::create(['guard_name' => 'api', 'name' => 'customer']);
        Permission::create(['guard_name' => 'api', 'name' => 'landlord']);

        // create roles and assign created permissions
		Role::create(['guard_name' => 'api', 'name' => 'super-users']);
        Role::create(['guard_name' => 'api', 'name' => 'squad']);
        Role::create(['guard_name' => 'api', 'name' => 'collection-department']);
        Role::create(['guard_name' => 'api', 'name' => 'back-office-staff']);
        Role::create(['guard_name' => 'api', 'name' => 'landlords']);
        Role::create(['guard_name' => 'api', 'name' => 'customers']);

    }
}
