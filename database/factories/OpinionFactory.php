<?php

namespace Database\Factories;

use App\Models\Opinion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OpinionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Opinion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->text(),
            'rating' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'user_id' => User::all()->random()->id,
        ];
    }
}
