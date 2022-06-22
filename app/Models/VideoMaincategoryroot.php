<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\VideoCategory;
class VideoMaincategoryroot extends Model
{
    protected $fillable=['title-ar','slug','status'];

    protected $table = 'video_maincategoryroot';
    public function maincategory(){
        return $this->hasMany('App\Models\VideoMainCategory','video_maincat_id','id')->where('status','active');
    }
 
    // public static function getVideoByMaincategoryroot($slug){ 
    //     return VideoMaincategoryroot::with('video')->where('slug',$slug)->first();
    // }
} 
 
