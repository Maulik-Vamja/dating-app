<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['custom_id', 'title', 'file', 'user_id', 'status', 'reject_reason', 'type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDocumentFileAttribute()
    {
        return $this->file ? Storage::url($this->file) : null;
    }
}
