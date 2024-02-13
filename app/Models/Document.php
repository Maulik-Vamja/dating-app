<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;
    public function getRouteKeyName()
    {
        return 'custom_id';
    }

    protected $fillable = ['title', 'custom_id','file', 'user_id','status', 'reject_reason', 'type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
