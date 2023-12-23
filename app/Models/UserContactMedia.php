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

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
    public function contact_media()
    {
        return $this->belongsTo(ContactMedia::class, "contact_media_id", "id");
    }
}
