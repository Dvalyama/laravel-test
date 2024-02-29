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
        Permissions::create(['name' => 'view']);
        Permissions::create(['name' => 'create']);
        Permissions::create(['name' => 'edit any']);
        Permissions::create(['name' => 'edit own']);
        Permissions::create(['name' => 'delete any']);
        Permissions::create(['name' => 'delete own']);



    }
}
