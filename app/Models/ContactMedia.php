<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'custom_id', 'name', 'icon', 'is_active'
    ];
}
