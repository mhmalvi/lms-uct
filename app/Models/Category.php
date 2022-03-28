<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['thumbnail_url'];

    public function getCreatedAtAttribute($value)
    {
        return date("M d, Y", strtotime($value));
    }

    public function getThumbnailUrlAttribute()
    {
        return $this->thumbnail ? asset('storage/categories/' . $this->thumbnail)
            : "https://via.placeholder.com/50";
    }
}
