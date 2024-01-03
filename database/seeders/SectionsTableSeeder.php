<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Section::truncate();
        Schema::enableForeignKeyConstraints();

        $sections = [
            [
                "name"          =>  "Dashboard",
                "grouping_name" =>  "Dashboard",
                "icon"          =>  "fas fa-home",
                "image"         =>  NULL,
                "icon_type"     =>  "icon", // icon or image
                "sequence"      =>  1,
                "is_active"     =>  "y",
                "created_at"    =>  now()->addSeconds(1),
                "updated_at"    =>  now()->addSeconds(1),
            ],
            [
                "name"          =>  "Escorts",
                "grouping_name" =>  "Escort Management",
                "icon"          =>  "fas fa-users",
                "image"         =>  NULL,
                "icon_type"     =>  "icon", // icon or image
                "sequence"      =>  2,
                "is_active"     =>  "y",
                "created_at"    =>  now()->addSeconds(2),
                "updated_at"    =>  now()->addSeconds(2),
            ],
            [
                "name"          =>  "Role Management",
                "grouping_name" =>  "User Management",
                "icon"          =>  "fas fa-briefcase",
                "image"         =>  NULL,
                "icon_type"     =>  "icon", // icon or image
                "sequence"      =>  3,
                "is_active"     =>  "y",
                "created_at"    =>  now()->addSeconds(3),
                "updated_at"    =>  now()->addSeconds(3),
            ],
            [
                "name"          =>  "CMS",
                "grouping_name" =>  "Content Management",
                "icon"          =>  "fas fa-book",
                "image"         =>  NULL,
                "icon_type"     =>  "icon", // icon or image
                "sequence"      =>  4,
                "is_active"     =>  "y",
                "created_at"    =>  now()->addSeconds(4),
                "updated_at"    =>  now()->addSeconds(4),
            ],
            [
                "name"          =>  "Settings",
                "grouping_name" =>  "Site Settings",
                "icon"          =>  "fas fa-cog",
                "image"         =>  NULL,
                "icon_type"     =>  "icon", // icon or image
                "sequence"      =>  5,
                "is_active"     =>  "y",
                "created_at"    =>  now()->addSeconds(5),
                "updated_at"    =>  now()->addSeconds(5),
            ],
            [
                "name"          =>  "Blog Management",
                "grouping_name" =>  "Blog Management",
                "icon"          =>  "fas fa-list",
                "image"         =>  NULL,
                "icon_type"     =>  "icon", // icon or image
                "sequence"      =>  6,
                "is_active"     =>  "y",
                "created_at"    =>  now()->addSeconds(5),
                "updated_at"    =>  now()->addSeconds(5),
            ],
            [
                "name"          =>  "App Update Setting",
                "grouping_name" =>  "App Update Setting",
                "icon"          =>  "fas fa-cog",
                "image"         =>  NULL,
                "icon_type"     =>  "icon",
                "sequence"      =>  7,
                "is_active"     => "n",
                "created_at"    => \Carbon\Carbon::now(),
                "updated_at"    => \Carbon\Carbon::now(),
            ],
            [
                "name"          =>  "Meta Tag Management",
                "grouping_name" =>  "Meta Tags Management",
                "icon"          =>  "fas fa-cog",
                "image"         =>  NULL,
                "icon_type"     =>  "icon",
                "sequence"      =>  8,
                "is_active"     => "y",
                "created_at"    => \Carbon\Carbon::now(),
                "updated_at"    => \Carbon\Carbon::now(),
            ],
        ];

        Section::insert($sections);
    }
}
