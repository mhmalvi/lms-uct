<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomPost extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function author()
    {
        return $this->belongsTo(Admin::class, 'user_id', 'id');
    }

    public function attachments()
    {
        return $this->hasMany(ClassroomPostAttachment::class);
    }
}
