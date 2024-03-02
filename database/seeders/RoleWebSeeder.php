<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleWebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create roles and assign created permissions
        $publisherPermissions = [
            'Publisher',
            'edit users',
            'update users',
            'delete users',
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
            'view ad packages',
            'view groups',
            'create media',
            'edit media',
            'update media',
            'delete media',
            'view media',
            'create comments',
            'edit comments',
            'update comments',
            'view comments',
            'create transactions',
            'view transactions',
            'view categories',
            'create tags',
            'view tags',
            'view countries',
            'view states',
            'view cities',
        ];
        $memberPermissions = [
            'Member',
            'edit users',
            'update users',
            'delete users',
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
            'view ad packages',
            'view groups',
            'create media',
            'edit media',
            'update media',
            'delete media',
            'view media',
            'create comments',
            'edit comments',
            'update comments',
            'view comments',
            'create transactions',
            'view transactions',
            'view categories',
            'create tags',
            'view tags',
            'view countries',
            'view states',
            'view cities',
        ];

        $publisherRole = Role::create(['name' => 'Publisher']);
        $publisherRole->givePermissionTo($publisherPermissions);

        $userRole = Role::create(['name' => 'Member']);
        $userRole->givePermissionTo($memberPermissions);
    }
}
