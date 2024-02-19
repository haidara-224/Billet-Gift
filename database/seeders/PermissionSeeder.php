<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'delete-user']);
        Permission::create(['name'=>'role-permission-user']);
        Permission::create(['name'=>'create-event']);
        Permission::create(['name'=>'edit-event']);
        Permission::create(['name'=>'show-event']);
        Permission::create(['name'=>'delete-event']);
    }
}
