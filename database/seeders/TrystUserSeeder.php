<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\GalleryImages;
use App\Enums\StatusEnums;
use Illuminate\Database\Eloquent\Factories\Factory ;

class TrystUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $model = User::class;
   // protected $galaryImage = GalleryImages::class;


    public function run(): void
    {
          $jsonData = '[ ]';


          $data = json_decode($jsonData, true);

        foreach ($data as $userJson) {

        $user = User::create([
            'custom_id' => get_unique_string('users'),
            'full_name' => $userJson['name'],
            'user_name' => str_replace(' ', '', $userJson['name']),
            'email' => str_replace(' ', '', $userJson['name']) . '@gmail.com',
            'password' => Hash::make('password'),
            'short_description' => $userJson['tagline'],
            'description' => $userJson['about'],
            'pronouns' => $userJson['pronouns'],
            'gender' => 'female',
            'age' => (int) preg_replace('/[^0-9]/', '', $userJson['age']),
            'caters_to' => $userJson['caters_to'],
            'body_type' => implode(',', $this->getRandomElements(['Slim', 'Curvy', 'Athletic', 'BBW', 'Muscular'], 2)), // Adjust the count as needed
            'height' => $this->getRandomNumberBetween(140, 190),
            'ethnicity' => $this->getRandomElement(['Asian', 'Black', 'Caucasian', 'Latin', 'Mixed']),
            'availibility' => json_encode(['Monday' => true, 'Tuesday' => true, 'Wednesday' => true, 'Thursday' => true, 'Friday' => true, 'Saturday' => true, 'Sunday' => true]),
            'availibility_description' => "ascasc",
            'cup_size' => $this->getRandomElement(['AA', 'A', 'B', 'C', 'D', 'DD', 'DDD', 'F', 'G']),
            'hair_colour' => $this->getRandomElement(['Black', 'Blonde', 'Brunette', 'Red', 'Grey', 'White']),
            'shoe_size' => $this->getRandomNumberBetween(3, 10),
            'eye_colour' => $this->getRandomElement(['Black', 'Blue', 'Brown', 'Green', 'Grey']),
            'last_logged_in' => now()->subYears(rand(0, 1))->format('Y-m-d H:i:s'),
            'profile_photo' => null,
            'thumbnail_image' => $userJson['slideshow_images'][0],
            'membership' => null,
            'contact_disclaimer' => "sacasc",
            'is_active' => $this->getRandomElement([StatusEnums::ACTIVE, StatusEnums::INACTIVE]),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        foreach ($userJson['slideshow_images'] as $imageUrl) {
        $user->gallery_images()->create([
            'custom_id' => get_unique_string(),
            'image' => $imageUrl,
        ]);
    }

    }
    }

    // Helper methods

    private function getRandomElement(array $array)
    {
        return $array[array_rand($array)];
    }

    private function getRandomNumberBetween($min, $max)
    {
        return rand($min, $max);
    }

    private function getRandomElements(array $array, $count = 1)
    {
        return array_rand(array_flip($array), $count);
    }

    // Add more helper methods as needed
}
