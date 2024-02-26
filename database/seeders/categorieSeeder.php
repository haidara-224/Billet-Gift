<?php

namespace Database\Seeders;

use App\Models\categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        categorie::create(['name'=>'Foot-ball']);
        categorie::create(['name'=>'concert']);
        categorie::create(['name'=>'Boxe']);
        categorie::create(['name'=>'Baskette-ball']);
        categorie::create(['name'=>'Hotel']);
        categorie::create(['name'=>'Taxi']);


    }
}
