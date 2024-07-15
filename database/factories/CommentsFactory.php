<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'user_id'=>\App\Models\User::get()->random()->user_id,
            // 'user_id'=>\App\Models\Blog::get()->random()->blog_id,
            // 'comment'=>$this->faker->paragraph(1)
        ];
    }
}
