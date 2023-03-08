<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'         => $this->faker->sentence(mt_rand(2,8)),
            'id_category'   => $this->faker->numberBetween(1,2),
            'id_user'   => 1,
            'short'         => $this->faker->paragraph(),
            'slug'          => $this->faker->slug(),
            'description'   => $this->faker->paragraph(5),
        ];
    }
}
