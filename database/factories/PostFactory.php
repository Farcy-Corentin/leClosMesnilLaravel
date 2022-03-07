<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * @inheritDoc
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();
        $postImage = array(
            "https://images.pexels.com/photos/6467627/pexels-photo-6467627.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260",
            "https://images.pexels.com/photos/4352247/pexels-photo-4352247.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260",
            "https://images.pexels.com/photos/4050430/pexels-photo-4050430.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260",
            "https://images.pexels.com/photos/916337/pexels-photo-916337.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260",
            "https://images.pexels.com/photos/164595/pexels-photo-164595.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260",
            "https://images.pexels.com/photos/827528/pexels-photo-827528.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260",
            "https://images.pexels.com/photos/2764182/pexels-photo-2764182.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260");

        $rand_key = array_rand($postImage, 1);
        $url = $postImage[$rand_key];

        /** @noinspection PhpPossiblePolymorphicInvocationInspection */
        return [
            'user_id' => User::factory()->active()->admin(),
            'category_id' => Category::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraphs(asText: true),
            'image_path' => $url,
            'comment_count' => 0
        ];
    }
}
