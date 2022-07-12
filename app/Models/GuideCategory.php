<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuideCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'forwardingagent', 'package'
    ];

    protected $dates = ['deleted_at'];

    public function guides()
    {
        // 1 X n
        return $this->hasMany(Guide::class);
    }

    public function combo()
    {
        return $this->all()->pluck('name', 'id');
    }
}
