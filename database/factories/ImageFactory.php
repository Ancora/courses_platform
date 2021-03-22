<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            /* image('path', width, height, true[false]) */
            /* true: no BD salva em 'public/storage/courses/image.jpg' */
            /* false: no BD salva como 'image.jpg' ==> por isso concatena com 'courses/' */
            'url' => 'courses/' . $this->faker->image('public/storage/courses', 640, 480, null, false),
        ];
    }
}
