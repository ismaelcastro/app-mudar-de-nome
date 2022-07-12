<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CasePage extends Model
{
    protected $table = 'cases';

    protected $fillable = [
        'name', 
        'image', 
        'imagehover', 
        'summary', 
        'description', 
        'tags', 
        'websites', 
        'slug', 
        'metatitle', 
        'metadescription', 
        'caseaction',
        'changetype_id',
        'reason_id'
    ];

    const TAGS = [
        1 => 'Prenome',
        2 => 'Sobrenome'
    ];

    public function setTagsAttribute($value)
    {
        if(!is_null($value))
            $this->attributes['tags'] = implode(',',$value);
        else
            $this->attributes['tags'] = null;
    }

    public function setWebsitesAttribute($value)
    {
        if(!is_null($value))
            $this->attributes['websites'] = implode(',',$value);
        else
            $this->attributes['websites'] = null;
    }
}
