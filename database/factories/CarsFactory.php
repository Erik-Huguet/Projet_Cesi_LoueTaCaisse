<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cars>
 */
class CarsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $arrayValues = ['berline', 'coupe', '4x4', 'utilitaire', 'sportive', 'SUV','citadine'];
        $arrayValuesPortes =[3,4,5] ;
        $arrayValuesUsersId =[1,2,3,4,5,6] ;
        return [
            'type'=>fake()->randomElement($arrayValues),
            'NbrPortes'=>fake()->randomElement($arrayValuesPortes),
            'tarif'=>fake()->numberBetween(100,900),
            'users_id'=>fake()->randomElement($arrayValuesUsersId),
        ];
    }
}
