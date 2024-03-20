<?php

namespace Database\Factories;

use App\Models\EmailNotification;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->userName(),
            'display_name' => fake()->name(),
            'avatar' => fake()->imageUrl(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'about_me' => "<p>Hello there! I'm [Your Name], and I'm passionate about learning and sharing knowledge in the exciting world of e-learning. With [X] years of experience in [relevant field or industry], I've cultivated a deep understanding of [specific areas of expertise]. My journey in e-learning began with a curiosity to explore innovative ways of educating and empowering individuals globally.</p><p><br></p><p>As an e-learning enthusiast, I thrive on creating engaging and interactive learning experiences tailored to diverse audiences. Whether it's designing captivating courses, crafting thought-provoking assessments, or harnessing the latest educational technologies, I'm dedicated to fostering a dynamic and enriching learning environment.</p><p>My approach to e-learning is grounded in pedagogical principles, blended with a flair for creativity and adaptability. I believe in the transformative power of education to inspire growth, spark curiosity, and drive meaningful change. Through my work, I aim to spark a passion for lifelong learning and equip learners with the skills and knowledge they need to succeed in a rapidly evolving digital landscape.</p><p><br></p><p>When I'm not immersed in the world of e-learning, you can find me [insert hobbies or interests related to personal or professional development]. I'm always eager to connect with fellow enthusiasts, collaborate on exciting projects, and explore new opportunities to innovate in the realm of online education.</p><p>Let's embark on this journey of discovery together and unlock the endless possibilities of e-learning!</p><p><br></p>"
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            $user->referralCode()->create(['code' => substr(md5(uniqid('', true)), 0, 8)]);

            $user->emailNotifications()->attach(EmailNotification::pluck('id'));
        });
    }
}
