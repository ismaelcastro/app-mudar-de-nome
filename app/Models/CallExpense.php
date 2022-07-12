<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallExpense extends Model
{
    protected $fillable = [
        'call_id', 'amount', 'description'
    ];

    public function call()
    {
        return $this->belongsTo(Call::class);
    }

    public function getAmountAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = number_format(str_replace(",",".",str_replace(".","",$value)), 2, '.', '');
    }
}
