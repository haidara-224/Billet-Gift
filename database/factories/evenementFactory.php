<?php

namespace Database\Factories;

use App\Models\categorie;
use Database\Seeders\categorieSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\evenement>
 */
class evenementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->words(4,true),
            'description'=>fake()->words(4,true),
            'date_debut'=>fake()->dateTime(),
            'date_fin'=>fake()->dateTime(),
            'salle_id'=>fake()->numberBetween(1,5),
            'organisateur_id'=>fake()->numberBetween(1,20),
            'categorie_id'=>fake()->numberBetween(1,5)

        ];
    }
}
