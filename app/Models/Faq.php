<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'name', 'faq_category_id', 'description', 'websites'
    ];

    public function faq_category()
    {   // n X 1
        return $this->belongsTo(FaqCategory::class);
    }
}
