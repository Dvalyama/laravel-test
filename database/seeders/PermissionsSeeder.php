<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'view post']);
        Permission::create(['name' => 'view comments']);
        Permission::create(['name' => 'publish comments']);
        Permission::create(['name' => 'delete comments']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'edit any posts']);
        Permission::create(['name' => 'edit own posts']);
        Permission::create(['name' => 'delete any posts']);
        Permission::create(['name' => 'delete own posts']);
        Permission::create(['name' => 'access admin panel']);




    }
}