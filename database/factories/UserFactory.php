<?php

namespace Database\Factories;

use App\Enums\StatusEnums;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'custom_id' => get_unique_string('users'),
            'full_name' => $this->faker->name(),
            'user_name' => get_unique_username($this->faker->userName()),
            'email' => $this->faker->unique()->safeEmail(),
            'password' =>  Hash::make('password'), // password
            'short_description' => $this->faker->text(20),
            'description' => $this->faker->text(4000),
            'pronouns'  => $this->faker->randomElement(['She', 'Her', 'Hers']),
            'gender'  => $this->faker->randomElement(['male', 'female', 'non-binary']),
            'age' => $this->faker->numberBetween(18, 60),
            'caters_to' => implode(',', $this->faker->randomElements(['Men', 'Women', 'Non-binary', 'Couples'])),
            'body_type' => implode(',', $this->faker->randomElements(['Slim', 'Curvy', 'Athletic', 'BBW', 'Muscular'])),
            'height' => $this->faker->numberBetween(140, 190),
            'ethnicity' => $this->faker->randomElement(['Asian', 'Black', 'Caucasian', 'Latin', 'Mixed']),
            'availibility' => json_encode(['Monday' => true, 'Tuesday' => true, 'Wednesday' => true, 'Thursday' => true, 'Friday' => true, 'Saturday' => true, 'Sunday' => true]),
            'availibility_description' => $this->faker->text(100),
            'cup_size' => $this->faker->randomElement(['AA', 'A', 'B', 'C', 'D', 'DD', 'DDD', 'F', 'G']),
            'hair_colour' => $this->faker->randomElement(['Black', 'Blonde', 'Brunette', 'Red', 'Grey', 'White']),
            'shoe_size' => $this->faker->numberBetween(3, 10),
            'eye_colour' => $this->faker->randomElement(['Black', 'Blue', 'Brown', 'Green', 'Grey']),
            'last_logged_in' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'profile_photo' => null,
            'thumbnail_image' => $this->faker->imageUrl(267, 400, 'escorts'),
            'membership' => null,
            'contact_disclaimer' => $this->faker->text(100),
            'is_active' => $this->faker->randomElement([StatusEnums::ACTIVE, StatusEnums::INACTIVE]),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
