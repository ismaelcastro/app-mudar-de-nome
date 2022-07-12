<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallRegister extends Model
{
    protected $fillable = [
        'user_id', 
        'client_id',
        'call_id', 
        'description', 
        'type',
        'step'
    ];

    const TYPE = [
        'important' => 'Importante',
        'normal' => 'Normal'
    ];

    const STEP = [
        'call' => 'Atendimento',
        'case' => 'Caso',
        'precess' => 'Processo'
    ];

    public function user()
    {   //nx1
        return $this->belongsTo(User::class);
    }

    public function client()
    {   //nx1
        return $this->belongsTo(Client::class);
    }

    public function call()
    {   //nx1
        return $this->belongsTo(Call::class);
    }

    public function getCreatedDateAttribute()
    {
        return date('d/m/Y', strtotime($this->created_at));        
    }
    
    public function getCreatedHoursAttribute()
    {
        return date('H:i', strtotime($this->created_at));        
    }
}
