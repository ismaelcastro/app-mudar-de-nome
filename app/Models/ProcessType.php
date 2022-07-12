<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProcessType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description'
    ];

    public function process_category()
    {
        return $this->hasMany(ProcessCategory::class);
    }

    public function combo()
    {
        return $this->all()->pluck('name', 'id');
    }
}
