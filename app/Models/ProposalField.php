<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProposalField extends Model
{
    protected $fillable = [
        'call_id', 'key', 'value',
    ];

    public function call()
    {
        return $this->belongsTo(Call::class);
    }
}
