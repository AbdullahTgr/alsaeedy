<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\VideoCategory;
class VideoMaincategory extends Model
{
    protected $fillable=['title-ar','title-fr','title','slug','status','video_maincatroot_id'];

    protected $table = 'video_maincategories';
    public function category(){
        return $this->hasMany('App\Models\VideoCategory','video_maincat_id','id')->where('status','active');
    }
 
    public static function getVideoByMaincategory($slug){ 
        return VideoMaincategory::with('category')->where('slug',$slug)->first();
    } 




}
 
  