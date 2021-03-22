<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'url' => 'https://drive.google.com/file/d/1DeVTeDeswj5VSxdi8ly_eD2Uv9NjrVAZ/preview',
            'iframe' => '<iframe src="https://drive.google.com/file/d/1DeVTeDeswj5VSxdi8ly_eD2Uv9NjrVAZ/preview" width="640" height="480"></iframe>',
            'platform_id' => 1,
        ];
    }
}
