<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);
$editorRole = Role::create(['name' => 'editor', 'guard_name' => 'web']);
$userRole = Role::create(['name' => 'user', 'guard_name' => 'web']);

$editArticlesPermission = Permission::create(['name' => 'edit articles', 'guard_name' => 'web']);
$publishArticlesPermission = Permission::create(['name' => 'publish articles', 'guard_name' => 'web']);

        // Add more permissions as needed

        // Assign permissions to roles
        $adminRole->givePermissionTo($editArticlesPermission, $publishArticlesPermission);

        $editorRole->givePermissionTo($editArticlesPermission);

        // Assign roles to users (you should replace '1' with the actual user ID)
        $user = \App\Models\User::find(1);
        $user->assignRole('user');

        // Assign multiple roles to a user
        $user->assignRole(['editor', 'user']);
    }
}
