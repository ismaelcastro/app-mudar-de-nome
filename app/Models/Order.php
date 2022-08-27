<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'client_id',
        'cart_id',
        'number_order',
        'tracking_code',
        'total',
        'canceled'
    ];
}
