<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Permissions
        $permissions = [
            'create posts',
            'edit posts',
            'delete posts',
            'create categories',
            'edit categories',
            'delete categories',
            'view statistics',
            'publish posts',
            'unpublish posts',
            'create pages',
            'edit pages',
            'delete pages',
            'manage users',
            'create tags',
            'edit tags',
            'delete tags',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $editor = Role::firstOrCreate(['name' => 'editor']);
        $author = Role::firstOrCreate(['name' => 'author']);

        // Assign permissions to roles
        $admin->givePermissionTo(\Spatie\Permission\Models\Permission::all());

        $editor->givePermissionTo([
            'create posts',
            'delete posts',
            'edit posts',
            'publish posts',
            'unpublish posts',
            'create pages',
            'edit pages',
            'create tags',
            'edit tags'
        ]);

        $author->givePermissionTo([
            'create posts',
            'edit posts',
            'create tags',
        ]);
        // Assign roles to the default user
        $user = \App\Models\User::where('name', 'admin')->first();
        if ($user) {
            $user->assignRole('admin');
            $user->givePermissionTo([
                'create posts',
                'edit posts',
                'delete posts',
                'create categories',
                'edit categories',
                'delete categories',
                'view statistics',
                'publish posts',
                'unpublish posts',
                'create pages',
                'edit pages',
                'delete pages',
                'manage users',
            ]);
        }
    }
}
