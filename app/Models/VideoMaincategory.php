<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\VideoCategory;
class VideoMaincategory extends Model
{
    protected $fillable=['title-ar','slug','status','video_maincatroot_id'];

    public function category(){
        return $this->hasMany('App\Models\VideoCategory','video_maincat_id','id')->where('status','active');
    }
 
    // public static function getVideoByMaincategory($slug){ 
    //     return VideoMaincategory::with('video')->where('slug',$slug)->first();
    // } 
}
 
