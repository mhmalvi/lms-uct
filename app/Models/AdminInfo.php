<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminInfo extends Model
{
    use HasFactory;

    protected $connection = "admin";

    protected $table = "user_infos";

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }
}
