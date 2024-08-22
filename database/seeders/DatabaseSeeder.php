<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(config("app.env") == "local"){
            $password = "password";
        }else{
            $password = Str::password();
        }

        $admin = User::create([
            "name" => "Administrator",
            "email" => "admin@example.org",
            "password" => Hash::make($password),
        ]);

        $this->command->info( "Super-Admin created: " . $admin->email . " with Password  " . $password );
        $this->command->newLine();
        $superadmin = Role::create(["name" => "super-admin"]);
        $admin->assignRole($superadmin);

        $this->call([
            PermissionSeeder::class,

        ]);

    }
}
