<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'real_name', 'gender', 'role', 'qq', 'cellphone', 'coop_name', 'taobao', 'coop_phone'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Detect if the user has a given role
     *
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->role == $role;
    }

    /**
     * If the user is a manager
     *
     * @return bool
     */
    public function isManager()
    {
        return $this->role == "administrator";
    }
}
