<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'occupation_area',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRolesArrayAttribute()
    {
        $roles = $this->roles;
       
        $array = [];
        foreach($roles as $role){
            array_push($array, $role->name);
        }
        return $roles;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
       
    public function hasPermission(Permission $permission)
    {
        return $this->hasAnyRoles($permission->roles);
    }
    
    public function hasAnyRoles($roles)
    {
        if(is_array($roles) || is_object($roles) ) {
            return !! $roles->intersect($this->roles)->count();
        }
        
        return $this->roles->contains('name', $roles);
    }

    public function getInitialsnameAttribute()
    {
        $name = $this->name;        
        $nameArray = explode(' ', $name);
        if(count($nameArray) > 1){
            $firstNameInitials = substr($nameArray[0], 0, 1);
            $lastNameInitials = substr($nameArray[1], 0, 1);
            return strtoupper($firstNameInitials.$lastNameInitials);
        }else{
            $nameInitials = substr($name, 0, 2);
            return $nameInitials;
        }
    }

    public function getFirstNameAttribute()
    {
        return \Functions::firstName($this->name);
    }
}
