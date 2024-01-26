<?php

namespace Database\Seeders;

use App\Models\GalleryImages;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserContactMedia;
use App\Models\UserPolicy;
use App\Models\UserRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        User::factory()->count(10)->create()->each(function ($user) {
            $user->rates()->saveMany(UserRate::factory()->count(rand(1, 5))->make());
            $user->policies()->saveMany(UserPolicy::factory()->count(rand(1, 5))->make());
            $user->contacts()->saveMany(UserContactMedia::factory()->count(rand(1, 5))->make());
 //           $user->addresses()->saveMany(UserAddress::factory()->count(rand(1, 5))->make());
            $user->gallery_images()->saveMany(GalleryImages::factory()->count(8)->make());
        });
    }
}
