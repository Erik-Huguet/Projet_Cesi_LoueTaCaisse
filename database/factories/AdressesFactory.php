<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adresses>
 */
class AdressesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $arrayValuesType = [1,2,3,4,5,6];
        return [
            'numero' =>fake()->randomNumber(5),
            'immeuble' =>fake()->name(10),
            'rue' =>fake()->address(),
            'codePostal'=>fake()->postcode(),
            'ville' =>fake()->city(),
            'pays' =>fake()->country(),
            'users_id'=>fake()->randomElement($arrayValuesType),
        ];
    }
}
