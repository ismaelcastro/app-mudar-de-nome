<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rectification extends Model
{
    protected $fillable = [
        'call_id', 
        'currentname',
        'desiredname',
        'status',
    ];
}
