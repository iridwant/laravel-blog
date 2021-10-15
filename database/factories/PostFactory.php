<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(3,6);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->paragraph(3, 6),
            'body' => collect($this->faker->paragraphs(mt_rand(15,30)))->map(fn($p) => "<p>$p</p>")->implode(''),
            'user_id' => mt_rand(1, 10),
            'category_id' => mt_rand(1, 4)
        ];
    }
}
