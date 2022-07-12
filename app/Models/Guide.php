<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guide extends Model
{
    use SoftDeletes;

    const TYPES = [
        'simple' => 'Simple',
        'word' => 'Word',
        'pdf' => 'PDF',
    ];

    protected $fillable = [
        'name', 'guide_category_id', 'type', 'file', 'description', 'info', 'step_by_step'
    ];

    protected $dates = ['deleted_at'];
    
    public function guide_category()
    {
        return $this->belongsTo(GuideCategory::class);
    }

    public function setStepByStepAttribute($value)
    {
        $this->attributes['step_by_step'] = implode(';;',$value);
    }

    public function getStepByStepAttribute($value)
    {
        return is_null($value) ? $value : explode(';;',$value);
    }
}
