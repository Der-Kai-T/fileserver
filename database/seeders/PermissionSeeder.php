<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            "file.index",
            "file.create",
            "file.update",
            "file.destroy",
            "file",
            "admin.user",
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                "name" => $permission,
            ]);
        }
    }
}
