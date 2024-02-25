<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "code" => fake()->word(),
            "description" => fake()->sentence(),
            "type" => fake()->randomElement(['percentage', 'fixed_amount']),
            "value" => fake()->numberBetween(1, 50),
            "max_uses" => fake()->numberBetween(50, 500),
            "expiry_date" => fake()->dateTimeBetween(now(), '+5 days'),
            "is_redeemable" => fake()->boolean(),
            "free_trial_days" => fake()->numberBetween(30, 360),
        ];
    }
}
