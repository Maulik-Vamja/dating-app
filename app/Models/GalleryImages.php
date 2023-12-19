<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'custom_id', 'user_id', 'image'
    ];
}
