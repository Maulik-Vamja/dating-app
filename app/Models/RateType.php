<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateType extends Model
{
    use HasFactory;

    protected $fillable = [
        'custom_id', 'type', 'is_active'
    ];

    public function rates()
    {
        return $this->hasMany(UserRate::class, "rate_type_id", "id");
    }
}
