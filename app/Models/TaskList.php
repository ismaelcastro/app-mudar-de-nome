<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $fillable = [
        'name', 'roles',
    ];

    const NOT_DELETE = [9,10,11,12,13,14,15];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function combo()
    {
        return $this->all()->pluck('name', 'id');
    }

    public function setRolesAttribute($value)
    {
        if(!is_null($value))
            $this->attributes['roles'] = implode(',',$value);
        else
            $this->attributes['roles'] = null;
    }

    public function getRolesAttribute($value)
    {
        if(!is_null($value))
            return explode(',',$value);
        else
            return null;
    }
}
