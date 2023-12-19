<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAvailibility extends Model
{
    use HasFactory;

    protected $fillable = [
        'custom_id', 'user_id', 'availibility', 'availibility_description'
    ];
}
