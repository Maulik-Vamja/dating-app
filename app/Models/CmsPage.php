<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CmsPage extends Model
{
    use HasFactory;

    protected $table = "cms_pages";

    protected $fillable = [
        "edited_by", "title", "slug", "description", "file", "is_active"
    ];

    public function editedBy() : BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
