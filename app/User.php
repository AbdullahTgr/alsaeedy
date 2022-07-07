<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','photo','status','provider','provider_id',
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

    public function orders(){
        return $this->hasMany('App\Models\Order');
    }

    public function get_w_posts(){
        return $this->hasMany('App\Models\Post','added_by','id')->where('status','active');
    }
    public function getposts(){
        return $this->hasMany('App\Models\Post','added_by','id')->where('status','active');
    }


 
    public static function GetWriterposts($name){ 
        $name=str_replace("-"," ",$name);
        $name=str_replace("@","/",$name);
        return User::with('getposts')->where('name',$name)->first();
    }

    public static function GetWritersposts(){ 
        return User::with('get_w_posts')->get();
    }


}
