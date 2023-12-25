<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Blog::truncate();
        BlogTag::truncate();
        Schema::enableForeignKeyConstraints();

        Blog::factory()->count(20)->create()->each(function ($blog) {
            $blog->tags()->attach(Tag::inRandomOrder()->limit(4)->pluck('id')->toArray());
        });
    }
}
