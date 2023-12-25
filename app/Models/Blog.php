<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'custom_id', 'slug', 'title', 'description', 'image', 'admin_id', 'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tags', 'blog_id', 'tag_id')->withTimestamps();
    }
}
