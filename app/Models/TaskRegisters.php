<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskRegisters extends Model
{
    protected $fillable = [
        'task_id', 'user_id', 'description',
    ];

    public function task()
    {   // n X 1
        return $this->belongsTo(Task::class);
    }

    public function user()
    {   //nx1
        return $this->belongsTo(User::class);
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
