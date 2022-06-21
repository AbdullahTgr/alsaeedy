<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Postnocomments extends Model
{
    protected $fillable=['post_id','comment','status','email','name'];


    public function posts(){
        return $this->hasOne('App\Models\Post','id','post_id');
    }
    public static function getAllComments(){ 
        

                  return Postnocomments::with('posts')->paginate(10);
     
    }


    public function post(){ 
        return $this->belongsTo(Post::class);
    }

 
}
