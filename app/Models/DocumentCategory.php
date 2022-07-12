<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'forwardingagent', 'package', 'order', 'image', 'description', 'client_add', 'by_contact'
    ];

    protected $dates = ['deleted_at'];

    public function documents()
    {
        // 1 X n
        return $this->hasMany(\App\Models\Document::class);
    }

    public function combo()
    {
        return $this->all()->pluck('name', 'id');
    }
}
