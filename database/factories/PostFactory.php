<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'text' => $this->faker->paragraph(5),
            //'category_id' => Category::inRandomOrder()->first()->id,
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
           /*
            'category_id' => Category::inRandomOrder()->value('id'),
            'user_id' => User::inRandomOrder()->value('id'),
            */
        ];
    }
}
