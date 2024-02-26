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
        Permission::create(['name'=>'role']);
        Permission::create(['name'=>'revoke_roles_permissions']);
        Permission::create(['name'=>'permission']);
        Permission::create(['name'=>'update_role_permission']);
        Permission::create(['name'=>'create_permission_roles']);
        Permission::create(['name'=>'delete']);
        Permission::create(['name'=>'show']);
    }
}
