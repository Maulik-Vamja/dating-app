<?php

namespace Database\Seeders;

use App\Enums\StatusEnums;
use App\Models\CmsPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CmsPagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        CmsPage::truncate();
        Schema::enableForeignKeyConstraints();

        $cms_pages = [
            [
                "edited_by"     =>  1,
                "title"         =>  "Home",
                "slug"          =>  "home",
                "description"   =>  "<p>home</p>",
                "file"          =>  NULL,
                "is_active"         =>  (StatusEnums::ACTIVE)->value,
                "created_at"    =>  now()->addSeconds(1),
                "updated_at"    =>  now()->addSeconds(1),
            ],
            [
                "edited_by"     =>  1,
                "title"         =>  "About Us",
                "slug"          =>  "about-us",
                "description"   =>  "<p>&nbsp; &nbsp; &nbsp;About Us</p>",
                "file"          =>  NULL,
                "is_active"         =>  (StatusEnums::ACTIVE)->value,
                "created_at"    =>  now()->addSeconds(2),
                "updated_at"    =>  now()->addSeconds(2),
            ],
            [
                "edited_by"     =>  1,
                "title"         =>  "Terms and Conditions",
                "slug"          =>  "terms-and-conditions",
                "description"   =>  "<p>&nbsp; &nbsp; &nbsp;Terms and Conditions</p>",
                "file"          =>  NULL,
                "is_active"         =>  (StatusEnums::ACTIVE)->value,
                "created_at"    =>  now()->addSeconds(3),
                "updated_at"    =>  now()->addSeconds(3),
            ],
            [
                "edited_by"     =>  1,
                "title"         =>  "Privacy",
                "slug"          =>  "privacy",
                "description"   =>  "<p>&nbsp; &nbsp; &nbsp;Privacy</p>",
                "file"          =>  NULL,
                "is_active"         =>  (StatusEnums::ACTIVE)->value,
                "created_at"    =>  now()->addSeconds(4),
                "updated_at"    =>  now()->addSeconds(4),
            ],
        ];

        CmsPage::insert($cms_pages);
    }
}
