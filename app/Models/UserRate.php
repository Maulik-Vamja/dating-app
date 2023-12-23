<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'custom_id', 'user_id', 'rate_type_id', 'rate', 'duration', 'currency_id', 'description', 'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
    public function rate_type()
    {
        return $this->belongsTo(RateType::class, "rate_type_id", "id");
    }
}
