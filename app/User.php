<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password','role_id','department_id','upload_image','salary'
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


    public function plan(){
        return $this->hasMany(Plan::class);
    }

    public function department(){ //1  many
        return $this->belongsTo(Department::class);
    }

    public function role(){ //1 many
        return $this->belongsTo(Role::class);
    }
    public function isAdmin(){

        if($this->role->id == 'Admin'){
            return true;
        }
        return false;
    }
}
