<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\View;


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

        // Create roles
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $editorRole = Role::findOrCreate(['name' => 'editor']);
        $userRole = Role::findOrCreate(['name' => 'user']);

        // Create permissions
        $editArticlesPermission = Permission::findOrCreate(['name' => 'edit articles']);
        $publishArticlesPermission = Permission::findOrCreate(['name' => 'publish articles']);
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

    public function yourControllerMethod()
    {
        $userHasPermission = auth()->user()->can('edit articles');
            // Debugging statements
    dd($userHasPermission);
    
        return view('navbar.navbar', ['userHasPermission' => $userHasPermission]);
    }
    
}
