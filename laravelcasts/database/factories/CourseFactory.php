<?php

namespace Database\Factories;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'paddle_product_id' => $this->faker->uuid,
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'tagline' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'image_name' => 'image.png',
            'learnings' => ['Learn A', 'Learn B', 'Learn C'],
        ];
    }

    public function released(Carbon $releasedAt = null): self
    {
        return $this->state(
            fn (array $attributes) => ['released_at' => $releasedAt ?? now()]
        );
    }

}
