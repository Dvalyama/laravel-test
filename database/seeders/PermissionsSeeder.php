<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permissions;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permissions::create(['name' => 'view post']);
        Permissions::create(['name' => 'view comments']);
        Permissions::create(['name' => 'publish comments']);
        Permissions::create(['name' => 'create posts']);
        Permissions::create(['name' => 'edit any posts']);
        Permissions::create(['name' => 'edit own posts']);
        Permissions::create(['name' => 'delete any posts']);
        Permissions::create(['name' => 'delete own posts']);



    }
}
