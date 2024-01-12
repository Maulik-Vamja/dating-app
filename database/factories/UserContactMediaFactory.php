<?php

namespace Database\Factories;

use App\Models\ContactMedia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserContactMedia>
 */
class UserContactMediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $contactMedia = ContactMedia::inRandomOrder()->first();
        return [
            'custom_id'     =>  get_unique_string(),
            'contact_media_id'  =>  $contactMedia->id,
            'value' => $contactMedia->name == 'Mobile' ? $this->faker->phoneNumber : ($contactMedia->name == 'Email' ?  $this->faker->email : $this->faker->url()),
        ];
    }
}
