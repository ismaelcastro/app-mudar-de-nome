<?php

namespace App\Models;

use App\Helpers\Functions;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = [
        'goal', 'bonus', 'color'
    ];

    public function setGoalAttribute($value)
    {
        if(!is_null($value))   
            $this->attributes['goal'] = Functions::_moedaDb($value);
        else
            $this->attributes['goal'] = null;
    }

    public function setBonusAttribute($value)
    {
        if(!is_null($value))   
            $this->attributes['bonus'] = Functions::_moedaDb($value);
        else
            $this->attributes['bonus'] = null;
    }
}
