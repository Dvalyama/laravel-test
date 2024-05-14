<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);
        $viewerRole = Role::create(['name' => 'viewer']);

        $this->call(PermissionsSeeder::class);

        $adminRole->permissions()->sync(Permission::pluck('id')->toArray());

        $editorRole->givePermissionTo([
            'view post',
            'view comments',
            'publish comments',
            'delete comments',
            'create posts',
            'edit own posts',
            'delete own posts',
        ]);

        $viewerRole->givePermissionTo([
            'view post',
            'view comments',
        ]);
    }
}
