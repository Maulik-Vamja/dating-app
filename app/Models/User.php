<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// class User extends Authenticatable implements MustVerifyEmail
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = "users";

    public function getRouteKeyName()
    {
        return "custom_id";
    }

    protected $fillable = [
        'custom_id', 'full_name', 'user_name', 'email', 'password', 'short_description', 'description', 'pronouns', 'gender', 'caters_to', 'body_type', 'height', 'ethnicity', 'cup_size', 'hair_colour', 'shoe_size', 'eye_colour', 'last_logged_in', 'profile_photo', 'thumbnail_image', 'membership', 'contact_disclaimer', 'age', 'availibility', 'availibility_description', 'is_active', 'is_trans'
    ];

    protected $hidden = [
        "password", "remember_token",
    ];

    protected $casts = [
        "email_verified_at" => "datetime",
    ];

    public function getTokenName()
    {
        return str_slug(config("utility.api.token_name") . " user");
    }

    public function getHeaderName()
    {
        return trim(collect(explode(" ", config("utility.api.auth_token_name")))->map(function ($segment) {
            return ucfirst($segment);
        })->prepend("X")->join("-"));
    }

    public function availability()
    {
        return $this->hasOne(UserAvailibility::class, "user_id", "id");
    }

    public function rates()
    {
        return $this->hasMany(UserRate::class, "user_id", "id");
    }
    public function policies()
    {
        return $this->hasMany(UserPolicy::class, "user_id", "id");
    }
    public function contacts()
    {
        return $this->hasMany(UserContactMedia::class, "user_id", "id")->where('is_active', 'y');
    }
    public function home_address()
    {
        return $this->hasOne(UserAddress::class, "user_id", "id")->where('address_type_id', 1)->latest();
    }
    public function home_addresses()
    {
        return $this->hasMany(UserAddress::class, "user_id", "id")->where('address_type_id', 1);
    }
    public function based_in_addresses()
    {
        return $this->hasMany(UserAddress::class, "user_id", "id")->where('address_type_id', 2);
    }
    public function addresses()
    {
        return $this->hasMany(UserAddress::class, "user_id", "id")->where('is_active', 'y');
    }
    public function gallery_images()
    {
        return $this->hasMany(GalleryImages::class, "user_id", "id");
    }
}
