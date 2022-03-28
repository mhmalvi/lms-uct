<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = [
        'thumbnail_url',
        'image_url',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getThumbnailUrlAttribute()
    {
        return ($this->thumbnail) ? asset('storage/courses/thumbnails/' . $this->thumbnail)
            : 'https://via.placeholder.com/50';
    }

    public function getImageUrlAttribute()
    {
        return $this->thumbnail ? asset('storage/courses/' . $this->thumbnail)
            : '';
    }
}
