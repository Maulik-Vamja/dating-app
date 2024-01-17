<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\UserPolicy;
use App\Models\RateType;
use App\Models\PolicyType;
use App\Models\ContactMedia;
use App\Models\GalleryImages;
use App\Models\Currency;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Enums\StatusEnums;
use Illuminate\Database\Eloquent\Factories\Factory ;
use Illuminate\Support\Facades\Storage;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;



class TrystUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $model = User::class;
    protected $userPolicy = UserPolicy::class;
   // protected $galaryImage = GalleryImages::class;

    public function run(): void
    {
          $jsonData = file_get_contents(storage_path('app/data.json'));;
          $data = json_decode($jsonData, true);

        foreach ($data as $userJson) {

        $user = User::create([
            'custom_id' => get_unique_string('users'),
            'full_name' => $userJson['name'],
            'user_name' => str_replace(' ', '', $userJson['name']). get_unique_string('users'),
            'email' => str_replace(' ', '', $userJson['name']) . uniqid().'@gmail.com',
            'password' => Hash::make('password'),
            'short_description' => $userJson['tagline'],
            'description' => $userJson['about'],
            'pronouns' => $userJson['pronouns'],
            'gender' => 'female',
            'age' => (int) preg_replace('/[^0-9]/', '', $userJson['age']),
            'caters_to' => $userJson['caters_to'],
            'body_type' => $userJson['body_type'], // Adjust the count as needed
            'height' => $this->getRandomNumberBetween(140, 190),
            'ethnicity' => $userJson['ethnicity'],
            'availibility' => json_encode(['Monday' => true, 'Tuesday' => true, 'Wednesday' => true, 'Thursday' => true, 'Friday' => true, 'Saturday' => true, 'Sunday' => true]),
            'availibility_description' => "ascasc",
            'cup_size' =>$userJson['cup_size'],
            'hair_colour' =>$userJson['hair_colour'],
            'shoe_size' => $userJson['shoe_size'],
            'eye_colour' => $userJson['eye_colour'],
            'last_logged_in' => Carbon::now()->subDays(rand(1, 15))->format('Y-m-d H:i:s'),
            'profile_photo' => null,
            'thumbnail_image' => $userJson['slideshow_images'][0],
            'membership' => null,
            'contact_disclaimer' => $userJson['contact_text'],
            'is_active' => $this->getRandomElement([StatusEnums::ACTIVE, StatusEnums::INACTIVE]),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        /* Upload Images */
//     foreach ($userJson['slideshow_images'] as $imageUrl) {
//         $customId = get_unique_string();
//         $storagePath = "escorts/gallery/{$user->id}/{$customId}.jpg";
//         $imageContent = file_get_contents($imageUrl);

//     if ($imageContent !== false) {
//         Storage::put($storagePath, $imageContent);
//         $user->gallery_images()->create([
//             'custom_id' => $customId,
//             'image' => $storagePath,
//         ]);
//     } else {
//        $user->gallery_images()->create([
//             'custom_id' => $customId,
//             'image' => $imageUrl,
//         ]);
//     }
//  }

 $manager = new ImageManager(new Driver());
foreach ($userJson['slideshow_images'] as $imageUrl) {
    $customId = get_unique_string();

     $oldStoragePath = "escorts/gallery/{$user->id}/{$customId}.jpg";
      //$filePath = storage_path("app/{$storagePath}");
    $storagePath = storage_path("app/public/escorts/gallery/{$user->id}/{$customId}.jpg");
    try {
        // Fetch image content from the URL
        $imageContent = file_get_contents($imageUrl);

        if ($imageContent !== false) {
            Log::info("Image content fetched successfully from: $imageUrl");

            // Save the original image
            Storage::put($oldStoragePath, $imageContent);
            Log::info("Original image saved successfully to: $storagePath");

            // Open the original image with Intervention Image Manager
            $img = $manager->read($storagePath);

            // Check if the image can be decoded successfully
            if ($img->exif() !== false) {
                Log::info("Image decoded successfully: $storagePath");

                // Get the original width and height of the image
                $originalWidth = $img->width();
                $originalHeight = $img->height();
                Log::info("Original image dimensions: {$originalWidth}x{$originalHeight}");

                // Calculate the new dimensions after cutting down 10% from each side
                $leftPercentage = 0.1;
                $rightPercentage = 0.1;
                $bottomPercentage = 0.2;

                $newWidth = $originalWidth * (1 - $leftPercentage - $rightPercentage);
                $newHeight = $originalHeight * (1 - $bottomPercentage);

                Log::info("New image dimensions: {$newWidth}x{$newHeight}");

                // Calculate the cropping positions
                $left = $originalWidth * $leftPercentage;
                $top = 0;  // No top cropping
                $right = $originalWidth - $originalWidth * $rightPercentage;
                $bottom = $originalHeight * $bottomPercentage;

                Log::info("Cropping positions: left={$left}, top={$top}, right={$right}, bottom={$bottom}");

                // Crop the image
                $img->crop($newWidth, $newHeight, $left, $top);
                Log::info("Image cropped successfully");

                // Save the cropped image
                if ($img->save($storagePath)) {
                    Log::info("Cropped image saved successfully to: $storagePath");

                    $user->gallery_images()->create([
                        'custom_id' => $customId,
                        'image' => $oldStoragePath,
                    ]);
                    Log::info("Database entry created for the image");
                } else {
                    Log::error("Failed to save the cropped image: $storagePath");
                }
            } else {
                Log::error("Unable to decode input: $storagePath");
            }
        } else {
            Log::error("Unable to fetch image content from: $imageUrl");
            continue;
        }
    } catch (\Exception $e) {
        Log::error("Exception: {$e->getMessage()}");
        continue;
    }
}

/*  $storagePath = storage_path('app/test4.jpg');
 $img = $manager->read($storagePath);
            $originalWidth = $img->width();
            $originalHeight = $img->height();

            // Calculate the new dimensions after cutting down 10% from each side
            $leftPercentage = 0.1;
            $rightPercentage = 0.1;
            $bottomPercentage = 0.2;

            $newWidth = $originalWidth * (1 - $leftPercentage - $rightPercentage);
            $newHeight = $originalHeight * (1 - $bottomPercentage);

            // Calculate the cropping positions
            $left = $originalWidth * $leftPercentage;
            $top = 0;  // No top cropping
            $right = $originalWidth - $originalWidth * $rightPercentage;
            $bottom = $originalHeight * $bottomPercentage;

            // Crop the image
            $img->crop($newWidth, $newHeight, $left, $top);


 $img->save($storagePath); */



 /* Upload Images end */


          if (isset($userJson['policies'])) {
        // Insert "deposits" policy
        if (isset($userJson['policies']['deposits'])) {
            DB::table('user_policies')->insert([
                'custom_id' => get_unique_string(),
                'user_id' => $user->id,
                'policy_type_id' => PolicyType::where('type', 'Deposits')->first()->id,
                'description' => $userJson['policies']['deposits'],
            ]);
        }

        // Insert "cancellations" policy
        if (isset($userJson['policies']['cancellations'])) {
            DB::table('user_policies')->insert([
                'custom_id' => get_unique_string(),
                'user_id' => $user->id,
                'policy_type_id' => PolicyType::where('type', 'Cancellations')->first()->id,
                'description' => $userJson['policies']['cancellations'],
            ]);
        }
    }

    // Insert rate models if "outcall_rates" exists in $userJson
    if (isset($userJson['outcall_rates'])) {
        foreach ($userJson['outcall_rates'] as $duration => $rate) {
            // Assuming you have a RateType model and a Currency model
            $rateType = RateType::where('type', "Outcall")->first();
            $currency = Currency::where('iso3', 'USD')->first(); // Change 'USD' to the appropriate code

            if ($rateType && $currency) {
                DB::table('user_rates')->insert([
                    'custom_id' => get_unique_string(),
                    'user_id' => $user->id,
                    'rate_type_id' => $rateType->id,
                    'rate' => $rate,
                    'duration' => $duration,
                    'currency_id' => $currency->id,
                    'description' => null, // You may set a description if available
                    'is_active' => true, // Adjust as needed
                ]);
            }
        }
    }

     if (isset($userJson['incall_rates'])) {
        foreach ($userJson['incall_rates'] as $duration => $rate) {
            // Assuming you have a RateType model and a Currency model
            $rateType = RateType::where('type', "Incall")->first();
            $currency = Currency::where('iso3', 'USD')->first(); // Change 'USD' to the appropriate code

            if ($rateType && $currency) {
                DB::table('user_rates')->insert([
                    'custom_id' => get_unique_string(),
                    'user_id' => $user->id,
                    'rate_type_id' => $rateType->id,
                    'rate' => $rate,
                    'duration' => $duration,
                    'currency_id' => $currency->id,
                    'description' => null, // You may set a description if available
                    'is_active' => true, // Adjust as needed
                ]);
            }
        }
    }


    /* start contact info */
if (isset($userJson['contact'])) {
    // Assuming you have a ContactMedia model
    foreach ($userJson['contact'] as $type => $value) {
            DB::table('user_contact_media')->insert([
                'custom_id' => get_unique_string(),
                'user_id' => $user->id,
                'contact_media_id' =>ContactMedia::where('name',  ucfirst($type))->first()->id,
                'value' => $value,
            ]);
    }
}



/* Add address */
/* Add address */
/* Add address */
if (isset($userJson['based_in'])) {
    $basedIn = $userJson['based_in'];

    // Assuming the format is "City, State, Country"
    $addressParts = explode(', ', $basedIn);

    $cityName = $addressParts[0] ?? null;
    $stateName = $addressParts[1] ?? null;

    // Use the predefined ID for the USA
    $countryId = 236; // Replace with the actual ID you have for the USA

    // Find or create the State within the USA
    $state = State::firstOrCreate(['country_id' => $countryId, 'name' => $stateName]);

    // Find or create the City within the given State and USA
    $city = City::firstOrCreate(['country_id' => $countryId, 'state_id' => $state->id, 'name' => $cityName]);

    // Now you can store the address information in your UserAddress model or use it as needed
    // For example, assuming you have a UserAddress model
    DB::table('user_addresses')->insert([
        'custom_id' => get_unique_string(),
        'user_id' => $user->id,
        'city_id' => $city->id,
        'state_id' => $state->id,
        'country_id' => $countryId,
        'country_id' => $countryId,
        'is_primary' => 'y'
    ]);
}




}
    }





    // Helper methods
    protected function getMediaType($type)
{
    // Assuming you have a MediaType model
    return ;
}

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
