<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class VideoComment extends Model
{
    protected $fillable=['user_id','video_id','comment','replied_comment','parent_id','status'];

    public function user_info(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function videos(){
        $user=Auth::user()->id;
        return $this->hasOne('App\Models\Video','id','video_id')->where("added_by",$user);
    }
    public static function getAllComments(){ 
        
        $role=Auth::user()->role;
        
        if($role=='admin'){
            return VideoComment::with('user_info')->paginate(10);
        }else{
                  $user=Auth::user()->id;
                  return VideoComment::with('user_info')->with('videos')->paginate(10);
       }
        
    }

    public static function getAllUserComments(){
        return VideoComment::where('user_id',auth()->user()->id)->with('user_info')->paginate(10);
    }

    public function video(){
        return $this->belongsTo(Video::class);
    }

    public function replies(){
        return $this->hasMany(VideoComment::class,'parent_id')->where('status','active');
    }
}
