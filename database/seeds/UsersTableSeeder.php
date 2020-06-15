<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole     = Role::where('name', 'admin')->first();
        $userRole      = Role::where('name', 'user')->first();
        $customerRole  = Role::where('name', 'customer')->first();
        $vendorRole    = Role::where('name', 'vendor')->first();

        $admin = User::create([
            'name' => 'Brent Hoskins',
            'email' => 'brenthoskins84@gmail.com',
            'password' => Hash::make ('t29*pass'),
        ]);

        $user = User::create([
            'name' => 'Heather Hoskins',
            'email' => 'heatherhoskins84@gmail.com',
            'password' => Hash::make ('password'),
        ]);

        $customer = User::create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => Hash::make ('password'),
        ]);

        $vendor = User::create([
            'name' => 'Vendor',
            'email' => 'vendor@gmail.com',
            'password' => Hash::make ('password'),
        ]);

        $admin->roles()->attach( $adminRole );
        $user->roles()->attach( $userRole );
        $customer->roles()->attach( $customerRole );
        $vendor->roles()->attach( $vendorRole );

    }
}
