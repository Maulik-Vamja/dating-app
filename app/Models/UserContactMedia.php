<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContactMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'custom_id', 'user_id', 'contact_media_id', 'value', 'is_active'
    ];
}
