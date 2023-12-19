<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'custom_id', 'user_id', 'country_id', 'state_id', 'city_id', 'is_primary', 'is_active'
    ];
}
