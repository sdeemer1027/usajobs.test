<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);




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


 //   }





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
    'fname'    =>'Company',
    'lname'    =>'User',
    'phone'    =>'954-391-0398',
    'city'     => 'Hollywood',
    'state'    => 'FL',
    'zip'      =>'33020',
'email' => 'company@example.com',
'password' => bcrypt('password'),
]);
$companyUser->assignRole('Company');
$company = Company::create([
    'name' =>'ABC Inc',
    'user_id'=> '2',
    'phone'=>'888-888-1212'
]);


// Create a Company user
        $companyUser = User::create([
            'name' => 'Company 2 User',
            'fname'    =>'Company2',
            'lname'    =>'User2',
            'phone'    =>'954-391-0398',
            'city'     => 'Hollywood',
            'state'    => 'FL',
            'zip'      =>'33020',
            'email' => 'company2@example.com',
            'password' => bcrypt('password'),
        ]);
        $companyUser->assignRole('Company');
        $company = Company::create([
            'name' =>'ACME',
            'user_id'=> '3',
            'phone'=>'999-999-1212'
        ]);





        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $companyUser =   User::create([
                'name' => $faker->unique()->userName,
                'fname'=> $faker->firstName,
                'lname'=> $faker->lastName,
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'), // Change 'password' to the desired password
                'address' => $faker->streetAddress,
                'city' => $faker->city,
                'state' => $faker->stateAbbr, // Generates a two-letter state abbreviation (e.g., "CA" for California)
                'zip' => $faker->postcode, // Generates a ZIP code (e.g., "12345")

                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $companyUser->assignRole('Company');


            // Create a company associated with the user
            $company = Company::create([
                'user_id' => $companyUser->id,
                'name' => $faker->unique()->company,
                'phone' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);










        }

// Create a Seeker user
$seekerUser = User::create([
'name' => 'Seeker User',
    'fname'    =>'Seeker',
    'lname'    =>'User',
    'phone'    =>'954-391-0398',
    'city'     => 'Hollywood',
    'state'    => 'FL',
    'zip'      =>'33020',
'email' => 'seeker@example.com',
'password' => bcrypt('password'),
]);
$seekerUser->assignRole('Seeker');


        $faker = Faker::create();

        for ($i = 0; $i < 1000; $i++) {
            $seekerUser = User::create([
                'name' =>  $faker->unique()->userName,
                'fname'=> $faker->firstName,
                'lname'=> $faker->lastName,
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
                'address' => $faker->streetAddress,
                'city' => $faker->city,
                'state' => $faker->stateAbbr, // Generates a two-letter state abbreviation (e.g., "CA" for California)
                'zip' => $faker->postcode, // Generates a ZIP code (e.g., "12345")

                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $seekerUser->assignRole('Seeker');



        }



// Find or create the "Admin" role if it doesn't exist
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);

// Get all existing permissions
        $permissions = Permission::all();

// Assign all permissions to the "Admin" role
        $adminRole->syncPermissions($permissions);



        $faker = Faker::create();
        $types = ['onsite', 'hybrid', 'remote']; // List of job types
        $corf =  ['Contract', 'FullTime','PartTime'];
        $salarymin = ['100000','110000','125000','60000','70000','90000','150000',];
        // Get all companies
        $companies = Company::all();

        foreach ($companies as $company) {
            for ($i = 0; $i < 10; $i++) {
                $jobType = $faker->randomElement($types);
                $jobcorf = $faker->randomElement($corf);
                $jobsalarymin= $faker->randomElement($salarymin);
                Job::create([
                    'company_id' => $company->id,
                    'user_id'=> $company->user_id,
                    'name' => $faker->jobTitle,
                    'type' => $jobType, // Assign a random type
                    'corf' => $jobcorf,
                    'salarymin' => $jobsalarymin,
                    'salarymax' => $jobsalarymin + 10000,
                    'description' => $faker->paragraph,
                    // Add other job fields as needed
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }


}
}
