<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Evenement;
use App\Models\Organisateur;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(categorieSeeder::class);
        $this->call(salleSeeder::class);
        $this->call(UserSeeder::class);
        Organisateur::factory(20)->create();
        Evenement::factory(50)->create();

    }
}
