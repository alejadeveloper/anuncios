<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPermissions = [
            'Admin',
            'edit users',
            'update users',
            'view users',
            'edit profiles',
            'update profiles',
            'view profiles',
            'edit ads',
            'update ads',
            'view ads',
            'view ad packages',
            'view groups',
            'view media',
            'view comments',
            'update transactions',
            'view transactions',
            'edit categories',
            'update categories',
            'view categories',
            'create tags',
            'edit tags',
            'update tags',
            'view tags',
            'edit countries',
            'update countries',
            'view countries',
            'edit states',
            'update states',
            'view states',
            'edit cities',
            'update cities',
            'view cities',
        ];

        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo($adminPermissions);
    }
}
