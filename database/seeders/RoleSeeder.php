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

        $editorRole->permissions()->sync(Permission::whereIn('name', [
            'view post',
            'view comments',
            'create posts',
            'edit own posts',
            'delete own posts',
        ])->pluck('id')->toArray());

        $viewerRole->permissions()->sync(Permission::whereIn('name', [
            'view post',
            'view comments',
        ])->pluck('id')->toArray());
    }
}
