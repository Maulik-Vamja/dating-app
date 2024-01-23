<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'custom_id', 'user_id', 'country_id', 'state_id', 'city_id', 'is_primary', 'is_active', 'address_type_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
    public function country()
    {
        return $this->belongsTo(Country::class, "country_id", "id");
    }
    public function state()
    {
        return $this->belongsTo(State::class, "state_id", "id");
    }
    public function city()
    {
        return $this->belongsTo(City::class, "city_id", "id");
    }
}
