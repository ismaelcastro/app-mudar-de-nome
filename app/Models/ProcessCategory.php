<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProcessCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'color', 'resume', 'process_type_id', 'etapa_mautic', 'status_call'
    ];

    public function process_type()
    {
        return $this->belongsTo(ProcessType::class);
    }
}
