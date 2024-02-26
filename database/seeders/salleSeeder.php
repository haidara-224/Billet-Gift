<?php

namespace Database\Seeders;

use App\Models\salle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class salleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        salle::create([
            'name'=>'stade general Lansana Conte',
            'adresse'=>fake()->address(),
            'capacity'=>fake()->numberBetween(1,100000)
        ]);
        salle::create([
            'name'=>'stade petit sory',
            'adresse'=>fake()->address(),
            'capacity'=>fake()->numberBetween(1,100000)
        ]);
        salle::create([
            'name'=>'stade du 28 septembre',
            'adresse'=>fake()->address(),
            'capacity'=>fake()->numberBetween(1,100000)
        ]);
        salle::create([
            'name'=>'Noom Hotel',
            'adresse'=>fake()->address(),
            'capacity'=>fake()->numberBetween(1,100000)
        ]);
        salle::create([
            'name'=>'Foire de la republique',
            'adresse'=>fake()->address(),
            'capacity'=>fake()->numberBetween(1,100000)
        ]);
    }
}
