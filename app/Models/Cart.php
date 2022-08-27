<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
    protected $fillable = [
        'client_id',
        'coupon_id',
        'open',
        'zipcode',
        'ip',
        'delivery_method',
        'delivery_amount',
        'delivery_time',
        'payment_method',
        'payment_details',
        'tracking_code',
        'discount_price',
        'total',
    ];
}
