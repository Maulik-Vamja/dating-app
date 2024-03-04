<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $table = "cities";

    protected $fillable = [
        "id", "country_id", "state_id", "name",
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
    public function userAddresses(): HasMany
    {
        return $this->hasMany(UserAddress::class);
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_addresses', 'city_id', 'user_id')->withPivot('address_type_id');
    }
}
