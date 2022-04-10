<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'uid',
        'bank_account',
        'email',
        'phone',
        'paymentSlip',
        'address_line_1',
        'admin_area_2',
        'admin_area_1',
        'postal_code',
        'amount',
        'currency',
        'transaction_id',
        'status',
    ];
}
