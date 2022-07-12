<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsCategory extends Model
{
    protected $fillable = [
        'name', 'slug', 'metaurl', 'metatitle', 'metadescription'
    ];

    public function news()
    {   // 1 X n
        return $this->hasMany(News::class);
    }

    public function combo()
    {
        return $this->all()->pluck('name', 'id');
    }

    public function setSlugAttribute($value)
    {
        if(is_null($value) || empty($value) )
        $value = $this->name;

        $this->attributes['slug'] = Str::slug($value);
    }
}
