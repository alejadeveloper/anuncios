<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminPermissions = [
            'Super Admin',
            'create users',
            'edit users',
            'update users',
            'delete users',
            'view users',
            'create profiles',
            'edit profiles',
            'update profiles',
            'delete profiles',
            'view profiles',
            'create ads',
            'edit ads',
            'update ads',
            'delete ads',
            'view ads',
            'create ad packages',
            'edit ad packages',
            'update ad packages',
            'delete ad packages',
            'view ad packages',
            'create groups',
            'edit groups',
            'update groups',
            'delete groups',
            'view groups',
            'create media',
            'edit media',
            'update media',
            'delete media',
            'view media',
            'create comments',
            'edit comments',
            'update comments',
            'delete comments',
            'view comments',
            'create transactions',
            'edit transactions',
            'update transactions',
            'delete transactions',
            'view transactions',
            'create categories',
            'edit categories',
            'update categories',
            'delete categories',
            'view categories',
            'create tags',
            'edit tags',
            'update tags',
            'delete tags',
            'view tags',
            'create countries',
            'edit countries',
            'update countries',
            'delete countries',
            'view countries',
            'create states',
            'edit states',
            'update states',
            'delete states',
            'view states',
            'create cities',
            'edit cities',
            'update cities',
            'delete cities',
            'view cities',
            'create roles',
            'edit roles',
            'update roles',
            'delete roles',
            'view roles',
            'create permissions',
            'edit permissions',
            'update permissions',
            'delete permissions',
            'view permissions',
        ];

        $superAdminRole = Role::create(['name' => 'Super Admin']);
        $superAdminRole->givePermissionTo($superAdminPermissions);
    }
}
