<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomPostAttachment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function classroom_post()
    {
        return $this->belongsTo(ClassroomPost::class);
    }

    public function getFileSizeAttribute($value)
    {
        return number_format((float)$value / 1000000, 2); // 1 mb = 1000000 bytes
    }
}
