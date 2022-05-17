<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class PostComment extends Model
{
    protected $fillable=['user_id','post_id','comment','replied_comment','parent_id','status'];

    public function user_info(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function posts(){
        $user=Auth::user()->id;
        return $this->hasOne('App\Models\Post','id','post_id')->where("added_by",$user);
    }
    public static function getAllComments(){ 
        
        $role=Auth::user()->role;
        
        if($role=='admin'){
            return PostComment::with('user_info')->paginate(10);
        }else{
                  $user=Auth::user()->id;
                  return PostComment::with('user_info')->with('posts')->paginate(10);
       }
        
    }

    public static function getAllUserComments(){
        return PostComment::where('user_id',auth()->user()->id)->with('user_info')->paginate(10);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function replies(){
        return $this->hasMany(PostComment::class,'parent_id')->where('status','active');
    }
}
