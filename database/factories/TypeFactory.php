<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type>
 */
class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       $listTypeMateriel=['Ordinateurs fixes', 'ordinateurs portables','tablettes','serveurs'
        ,'équipements de réseau'
        ,'équipements de télécommunication'
        ,'imprimante'
        ,'consommables'
        ,'périphériques'];

        return [
            'title'=>$this->faker->unique()->randomElement($listTypeMateriel),
        ];
    }
}
