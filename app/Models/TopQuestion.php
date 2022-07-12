<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopQuestion extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'question', 'answer', 'order','top_question_category_id'
    ];

    protected $dates = ['deleted_at'];

    public function top_question_category()
    {
        return $this->belongsTo(TopQuestionCategory::class);
    }
}
