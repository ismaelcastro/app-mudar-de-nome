<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{

    protected $fillable = [
        'task_list_id', 'description', 'date', 'users', 'status', 'priority', 'call_id', 'address', 'attachment',
    ];

    const STATUS = [
        'open' => 'Aberto',
        'close' => 'Fechado'
    ];

    const PRIORITY = [
        'low' => 'Baixa',
        'normal' => 'Média',
        'high' => 'Alta'
    ];    

    public function task_register()
    {
        // 1 X n
        return $this->hasMany(TaskRegisters::class);
    }

    public function task_list()
    {
        // n X 1
        return $this->belongsTo(TaskList::class);
    }

    public function call()
    {
        // n X 1
        return $this->belongsTo(Call::class);
    }

    public function setUsersAttribute($value)
    {
        if(!is_null($value))
            $this->attributes['users'] = implode(',',$value);
        else
            $this->attributes['users'] = null;
    }

    public function getUsersAttribute($value)
    {
        if(!is_null($value))
            return explode(',',$value);
        else
            return null;
    }

    public function users_list()
    {
        $users = $this->users;
        if(!is_null($users)){
            if(is_array($users)){
                return User::whereIn('id', $users)->get();
            }else{
                $users_array = explode(',',$users);
                return User::whereIn('id', $users_array)->get();
            }
            
        }else{
            return [];
        }
    }

    public function getWhenAttribute()
    {
        $date = $this->date; 
        if($this->status != 'close'){       
            $datenow = date('Y-m-d H:i:s');        
            $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date);
            $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $datenow);
            $intervalo = $from->diff( $to );
            
            $dias = $intervalo->days;
            if($intervalo->invert == 1)
                $diasShow = $dias - ($dias*2);
            else
                $diasShow = $dias;

            if($diasShow == 0){
                return "<span class='text-warning'>Hoje</span>";
            }elseif($diasShow < 0){
                return "<span class='text-danger'>Atrasado $dias dia(s)</span>";
            }elseif($diasShow == 1){
                return "<span class='text-success'>Amanhã</span>";
            }elseif($diasShow > 1){
                return "<span class='text-success'>Daqui $dias dias</span>";
            }
        }else{
            return "<span style='color#ccc'>Finalizado</span>";
        }
        return '';
    }

    public function getCreatedDateAttribute()
    {
        return date('d/m/Y', strtotime($this->created_at));        
    }

    public function getCreatedHoursAttribute()
    {
        return date('H:i', strtotime($this->created_at));        
    }


    public function getDateDateAttribute()
    {
        return date('d/m/Y', strtotime($this->date));        
    }

    public function getDateBrAttribute()
    {
        $function = new \Functions;    
        return $function->dataHoraExtenso($this->date); //$now->formatLocalized('%A %d de %B de %Y');           
    }

    public function getDateHoursAttribute()
    {
        return date('H:i', strtotime($this->date));        
    }
}
