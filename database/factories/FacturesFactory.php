<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factures>
 */
class FacturesFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $arrayValuesUsersId =[1,2,3,4,5,6] ;
        $arrayValuesContratsId =[1,2,3,4,5,6] ;
        return [
            'montant'=>fake()->numberBetween(100,900),
            'users_id' => fake()->randomElement($arrayValuesUsersId),
            'contrats_id' => fake()->randomElement($arrayValuesContratsId),
        ];
    }
}
