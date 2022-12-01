<?php

namespace Database\Seeders;

use App\Enums\UserPermissions;
use App\Enums\UserRoles;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermissionsSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        Permission::create(['name' => UserPermissions::manage->name]);
        Permission::create(['name' => UserPermissions::see->name]);
        // create roles and assign created permissions
        Role::create(['name' => UserRoles::admin->name])->givePermissionTo(UserPermissions::manage->name);
        Role::create(['name' => UserRoles::manager->name])->givePermissionTo([UserPermissions::see->name]);
        Role::create(['name' => UserRoles::user->name]);
    }
}
