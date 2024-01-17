<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TrystUserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'full_name' => $this->faker->name,
            'user_name' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'),
            'pronouns' => $this->faker->randomElement(['She/Her', 'He/Him', 'They/Them']),
            // Add other attributes as needed
        ];
    }
}
