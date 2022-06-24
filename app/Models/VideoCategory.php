<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Video;
class VideoCategory extends Model
{
    protected $fillable=['title-ar','slug','title','title-fr','status','video_maincat_id'];

    public function video(){
        return $this->hasMany('App\Models\Video','video_cat_id','id')->where('status','active');
    }

    public static function getVideoByCategory($slug){ 
        return VideoCategory::with('video')->where('slug',$slug)->first();
    }
} 
 
 