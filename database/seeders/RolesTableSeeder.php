<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles for the "Company" team
 //       Role::create(['name' => 'companyowner']);
 //       Role::create(['name' => 'companyemployee']);
        // Add more roles as needed

        // Create roles
        $adminRole = Role::create(['name' => 'Admin']);
        $companyRole = Role::create(['name' => 'Company']);
        $seekerRole = Role::create(['name' => 'Seeker']);

// Create permissions
        $adminPermissions = ['create_users', 'edit_users', 'delete_users'];
        $companyPermissions = ['create_products', 'edit_products', 'delete_products'];
        $seekerPermissions = ['view_jobs', 'apply_jobs'];

        foreach ($adminPermissions as $permission) {
            Permission::create(['name' => $permission]);
            $adminRole->givePermissionTo($permission);
        }

        foreach ($companyPermissions as $permission) {
            Permission::create(['name' => $permission]);
            $companyRole->givePermissionTo($permission);
        }

        foreach ($seekerPermissions as $permission) {
            Permission::create(['name' => $permission]);
            $seekerRole->givePermissionTo($permission);
        }


    }





    //    DB::table('users')->insert([
$adminUser = User::create([
'name'     => 'Dr.Steve',
'fname'    =>'Steve',
'lname'    =>'Deemer',
'phone'    =>'954-391-0398',
'city'     => 'Hollywood',
'state'    => 'FL',
'zip'      =>'33020',
'email'    => 'dr.steve@steven.news',
'password' => bcrypt('password'),
]);
$adminUser->assignRole('Admin');




// Create a Company user
$companyUser = User::create([
'name' => 'Company User',
'email' => 'company@example.com',
'password' => bcrypt('password'),
]);
$companyUser->assignRole('Company');

// Create a Seeker user
$seekerUser = User::create([
'name' => 'Seeker User',
'email' => 'seeker@example.com',
'password' => bcrypt('password'),
]);
$seekerUser->assignRole('Seeker');








}
