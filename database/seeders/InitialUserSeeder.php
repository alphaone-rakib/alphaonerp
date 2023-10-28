<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InitialUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'f_name' => 'Mr.',
            'm_name' => 'Super',
            'l_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '01712340889',
            'address_one' => 'Dhaka, BD',
            'status' => '1',
        ]);
        $adminRole = Role::where('name', 'Super Admin')->first();
        $admin->assignRole([$adminRole->id]);
    }
}
