<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'document_category_id',
        'type',
        'file',
        'description',
        'info',
        'step_by_step',
        'token_d4sign',
        'template_d4sign',
        'uuid_cofre',
        'uuid_pasta',
        'affiliation',
        'subscription_info',
        'subscription_info2',
        'price'
    ];

    protected $dates = ['deleted_at'];

    const TYPES = [
        'simple' => 'Simple',
        'word' => 'Word',
        'pdf' => 'PDF',
        'd4sign' => 'D4Sign',
        'despachante' => 'Despachante',
        'declaracao' => 'Declaração'
    ];
    
    public function document_category()
    {   // n X 1
        return $this->belongsTo(\App\Models\DocumentCategory::class);
    }

    public function setStepByStepAttribute($value)
    {
        $this->attributes['step_by_step'] = implode(';;',$value);
    }

    public function getStepByStepAttribute($value)
    {
        return is_null($value) ? $value : explode(';;', $value);
    }

    public function setPriceAttribute($value)
    {
        $price = str_replace(',', '.',  $value);
        $this->attributes['price'] = number_format((float)$price, 2);
    }

    public function getPriceAttribute($value)
    {
        return $this->attributes['price'] = number_format($value, 2);
    }
}
