<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = "users";

    public function getRouteKeyName()
    {
        return "custom_id";
    }

    protected $fillable = [
        "custom_id", "first_name", "last_name", "email", "password",
        "country_code", "contact_number", "profile_photo", "referred_by", "is_active",
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
}
