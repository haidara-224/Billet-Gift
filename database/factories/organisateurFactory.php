<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\organisateur>
 */
class organisateurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->words(5,true),
            'description'=>fake()->sentences(2,true),
            'adresse'=>fake()->address(),
            'email'=>fake()->email(),
            'tel'=>fake()->phoneNumber(),
        ];
    }
}
