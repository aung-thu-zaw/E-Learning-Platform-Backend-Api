<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NavBanner>
 */
class NavBannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "description" => fake()->sentence(),
            "url" => fake()->url(),
            "button" => fake()->word(),
            "countdown" => null,
            "start_date_time" => fake()->dateTime(now()),
            "end_date_time" => fake()->dateTime(now()),
            "is_active" => fake()->boolean()
        ];
    }
}
