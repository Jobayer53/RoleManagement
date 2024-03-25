<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\RolePermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $admin = User::where('name', 'superadmin')->first();

        if (is_null($admin)) {
            $admin           = new User();
            $admin->name     = "Super Admin";
            $admin->email    = "superadmin@example.com";
            $admin->password = Hash::make('12345678');
            $admin->save();
        }

        $this->call(RolePermissionSeeder::class);


    }
}
