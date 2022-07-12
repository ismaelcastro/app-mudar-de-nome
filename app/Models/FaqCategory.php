<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    protected $fillable = [
        'name', 'metaurl', 'metatitle', 'metadescription', 'slug',
    ];

    public function faqs()
    {
        // 1 X n
        return $this->hasMany(Faq::class);
    }

    public function combo()
    {
        return $this->all()->pluck('name', 'id');
    }
}
