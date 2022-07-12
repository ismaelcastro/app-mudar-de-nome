<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopQuestionCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description'
    ];

    protected $dates = ['deleted_at'];

    public function topQuestion()
    {
        return $this->hasMany(TopQuestion::class);
    }

    public function combo()
    {
        return $this->all()->pluck('name', 'id');
    }
}
