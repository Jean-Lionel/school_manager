<?php

namespace Database\Factories;

use App\Models\Classe;
use App\Models\Cour;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cour::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //

            'name'=> $this->faker->name,
            'classe_id' => Classe::all()->random()->id

        ];
    }
}
