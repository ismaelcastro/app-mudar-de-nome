<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Changetype extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    protected $dates = ['deleted_at'];

    public function combo()
    {
        return $this->all()->pluck('name', 'id');
    }
}
