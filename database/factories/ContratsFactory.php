<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contrats>
 */
class ContratsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $arrayValuesUsersId =[1,2,3,4,5,6] ;
        $arrayValuesCarsId =[1,2,3,4,5,6] ;
        return [
            'duree' => fake()->numberBetween(1,31),
            'dateDebut' =>fake()->date('Y-m-d'),
            'dateFin' => fake()->date('Y-m-d'),
            'users_id' => fake()->randomElement($arrayValuesUsersId),
            'cars_id' => fake()->randomElement($arrayValuesCarsId)


        ];
    }
}
