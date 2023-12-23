<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPolicy extends Model
{
    use HasFactory;

    protected $fillable = [
        'custom_id', 'user_id', 'policy_type_id', 'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
    public function policy_type()
    {
        return $this->belongsTo(PolicyType::class, "policy_type_id", "id");
    }
}
