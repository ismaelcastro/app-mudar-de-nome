<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = [
        'call_id', 'name', 'datetime_start', 'datetime_finish', 'users', 'status', 'alert', 'description',
    ];

    const STATUS = [
        'open' => 'Aberto',
        'close' => 'Fechado'
    ];

    public function call()
    {   // n X 1
        return $this->belongsTo(Call::class);
    }

    public function users_list()
    {
        $users = $this->users;
        if(!is_null($users) && is_array($users)){
            return User::whereIn('id', $users)->get();
        }else{
            return [];
        }
    }

    public function setUsersAttribute($value)
    {
        if(!is_null($value))
            $this->attributes['users'] = implode(',',$value);
        else
            $this->attributes['users'] = null;
    }

    public function getDateStartBrAttribute()
    {
        $function = new \Functions;    
        return $function->dataHoraExtensoEvento($this->datetime_start, $this->datetime_finish); //$now->formatLocalized('%A %d de %B de %Y');       
    }

    public function getUsersAttribute($value)
    {
        if(!is_null($value))
            return explode(',',$value);
        else
            return null;
    }
}
