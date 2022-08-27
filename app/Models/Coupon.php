<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'name',
        'code',
        'status',
        'coupon_type',
        'amount',
        'percentage',
        'start',
        'finish',
        'min',
        'max',
        'single',
    ];
}
