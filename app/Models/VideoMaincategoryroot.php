<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\VideoMaincategory;
class VideoMaincategoryroot extends Model
{
    protected $fillable=['title','title-fr','title-ar','slug','status'];

    protected $table = 'video_maincategoryroot';
    public function maincategory(){
        return $this->hasMany('App\Models\VideoMaincategory','video_maincatroot_id','id')->where('status','active');
    }

    
    public static function getVideoByMaincategoryroot($slug){ 
        return VideoMaincategoryroot::with('maincategory')->where('slug',$slug)->get();
    }


    
} 
  
