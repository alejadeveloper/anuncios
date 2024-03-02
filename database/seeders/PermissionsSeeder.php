<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'Publisher']);
        Permission::create(['name' => 'Member']);
        Permission::create(['name' => 'Admin']);
        Permission::create(['name' => 'Super Admin']);

        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'view users']);

        // Profiles Permissions
        Permission::create(['name' => 'create profiles']);
        Permission::create(['name' => 'edit profiles']);
        Permission::create(['name' => 'update profiles']);
        Permission::create(['name' => 'delete profiles']);
        Permission::create(['name' => 'view profiles']);

        // Ads Permissions
        Permission::create(['name' => 'create ads']);
        Permission::create(['name' => 'edit ads']);
        Permission::create(['name' => 'update ads']);
        Permission::create(['name' => 'delete ads']);
        Permission::create(['name' => 'view ads']);

        // Ad Packages Permissions
        Permission::create(['name' => 'create ad packages']);
        Permission::create(['name' => 'edit ad packages']);
        Permission::create(['name' => 'update ad packages']);
        Permission::create(['name' => 'delete ad packages']);
        Permission::create(['name' => 'view ad packages']);

        // Groups Permissions
        Permission::create(['name' => 'create groups']);
        Permission::create(['name' => 'edit groups']);
        Permission::create(['name' => 'update groups']);
        Permission::create(['name' => 'delete groups']);
        Permission::create(['name' => 'view groups']);

        // Media Permissions
        Permission::create(['name' => 'create media']);
        Permission::create(['name' => 'edit media']);
        Permission::create(['name' => 'update media']);
        Permission::create(['name' => 'delete media']);
        Permission::create(['name' => 'view media']);

        // Comments Permissions
        Permission::create(['name' => 'create comments']);
        Permission::create(['name' => 'edit comments']);
        Permission::create(['name' => 'update comments']);
        Permission::create(['name' => 'delete comments']);
        Permission::create(['name' => 'view comments']);

        // Transactions Permissions
        Permission::create(['name' => 'create transactions']);
        Permission::create(['name' => 'edit transactions']);
        Permission::create(['name' => 'update transactions']);
        Permission::create(['name' => 'delete transactions']);
        Permission::create(['name' => 'view transactions']);

        // Categories Permissions
        Permission::create(['name' => 'create categories']);
        Permission::create(['name' => 'edit categories']);
        Permission::create(['name' => 'update categories']);
        Permission::create(['name' => 'delete categories']);
        Permission::create(['name' => 'view categories']);

        // Tags Permissions
        Permission::create(['name' => 'create tags']);
        Permission::create(['name' => 'edit tags']);
        Permission::create(['name' => 'update tags']);
        Permission::create(['name' => 'delete tags']);
        Permission::create(['name' => 'view tags']);

        // Countries Permissions
        Permission::create(['name' => 'create countries']);
        Permission::create(['name' => 'edit countries']);
        Permission::create(['name' => 'update countries']);
        Permission::create(['name' => 'delete countries']);
        Permission::create(['name' => 'view countries']);

        // States Permissions
        Permission::create(['name' => 'create states']);
        Permission::create(['name' => 'edit states']);
        Permission::create(['name' => 'update states']);
        Permission::create(['name' => 'delete states']);
        Permission::create(['name' => 'view states']);

        // Cities Permissions
        Permission::create(['name' => 'create cities']);
        Permission::create(['name' => 'edit cities']);
        Permission::create(['name' => 'update cities']);
        Permission::create(['name' => 'delete cities']);
        Permission::create(['name' => 'view cities']);

        // Roles Permissions
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);
        Permission::create(['name' => 'view roles']);

        // Permissions Permissions
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'edit permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);
        Permission::create(['name' => 'view permissions']);
    }
}
