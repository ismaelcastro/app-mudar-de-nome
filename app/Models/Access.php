<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $fillable = [
        'client_id',
        'call_id',
        'code',
        'finish',
        'url',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function call()
    {
        return $this->belongsTo(Call::class);
    }
}
