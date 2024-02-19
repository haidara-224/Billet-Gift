<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@admin.gn',
            'password'=>Hash::make('0000')
        ]);
        User::create([
            'name'=>'super admin',
            'email'=>'super@super.gn',
            'password'=>Hash::make('0000')
        ]);
        User::create([
            'name'=>'user',
            'email'=>'user@user.gn',
            'password'=>Hash::make('0000')
        ]);
    }
}