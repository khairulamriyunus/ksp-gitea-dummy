<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        $roles = [];

        $roles['administrator'] = Role::firstOrCreate(['name' => 'administrator']);
        $roles['administrator']->syncPermissions([]);

        // Super Admin — always assigned the first role
        $superAdmin = \App\Models\User::firstOrCreate(
            ['email' => env('SUPER_ADMIN_EMAIL', 'admin@example.com')],
            [
                'name'     => env('SUPER_ADMIN_NAME', 'Super Admin'),
                'password' => Hash::make(env('SUPER_ADMIN_PASSWORD', 'changeme')),
            ]
        );
        if (isset($roles['administrator'])) {
            $superAdmin->assignRole($roles['administrator']);
        }
    }
}