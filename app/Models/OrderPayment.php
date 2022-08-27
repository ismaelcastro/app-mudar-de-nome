<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    protected $fillable = [
        'order_id',
        'order_id',
        'module_id',
        'module_id',
        'payment_method',
        'payment_details',
        'status',
        'amount',
    ];
}
