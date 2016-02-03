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

    /**
     * Sort users in an alphabetical order
     *
     * @return mixed
     */
    public static function alphabetically()
    {
        return User::orderBy('name')->paginate(30);
    }

    /**
     * Get the user's products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    /**
     * Get the count of one's products
     *
     * @return int
     */
    public function productsCount()
    {
        return $this->products()->get()->count();
    }

    /**
     * Get the user's role (in readable string)
     *
     * @return string
     */
    public function getRole()
    {
        switch ($this->role) {
            case "individual":
                $role = "个人";
                break;
            case "cooperative":
                $role = "合作社";
                break;
            default:
                $role = "管理员";
                break;
        }

        return $role;
    }

    /**
     * Search users in a given keyword
     *
     * @param $keyword
     * @return mixed
     */
    public static function search($keyword)
    {
        return User::where('name', 'like', "%{$keyword}%")
            ->orWhere('real_name', 'like', "%{$keyword}%")
            ->orderBy('name')
            ->paginate(30);
    }
}
