<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create([
            'name' => 'Super Admin',
            'guard_name' => 'web',
            'price' => '1',
            'validity' => '1825',
            'is_default' => '1',
        ]);
        $permissions = Permission::select('id')->get()->pluck('id');
        $role->syncPermissions($permissions);
    }
}
