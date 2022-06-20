<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable=['title','tags','summary','slug','description','photo','quote','title-ar','summary-ar','description-ar','quote-ar','title-fr','summary-fr','description-fr','quote-fr','video_cat_id','video_tag_id','added_by','status'];
    

    public function cat_info(){
        return $this->hasOne('App\Models\VideoCategory','id','video_cat_id');
    }
    public function tag_info(){
        return $this->hasOne('App\Models\VideoTag','id','video_tag_id');
    }

    public function author_info(){
        return $this->hasOne('App\User','id','added_by');
    }
    public static function getAllVideo(){
        
        $role=Auth::user()->role;
        if($role=='admin'){
            return Video::with(['cat_info','author_info'])->orderBy('id','DESC')->paginate(10);
        }else{
            $user=Auth::user()->id;
            return Video::with(['cat_info','author_info'])->where('added_by',$user)->orderBy('id','DESC')->paginate(10);
        }
        
    }
    // public function get_comments(){
    //     return $this->hasMany('App\Models\VideoComment','video_id','id');
    // }
    public static function getvideoBySlug($slug){
        return Video::with(['tag_info','author_info'])->where('slug',$slug)->where('status','active')->first();
    }

    public function comments(){
        return $this->hasMany(VideoComment::class)->whereNull('parent_id')->where('status','active')->with('user_info')->orderBy('id','DESC');
    }
    public function allComments(){
        return $this->hasMany(VideoComment::class)->where('status','active');
    }


    // public static function getProductByCat($slug){
    //     // dd($slug);
    //     return Category::with('products')->where('slug',$slug)->first();
    //     // return Product::where('cat_id',$id)->where('child_cat_id',null)->paginate(10);
    // }

    // public static function getBlogByCategory($id){
    //     return Video::where('video_cat_id',$id)->paginate(8);
    // }
    public static function getBlogByTag($slug){
        // dd($slug);
        return Video::where('tags',$slug)->paginate(8);
    }

    public static function countActivevideo(){
        $data=Video::where('status','active')->count();
        if($data){
            return $data;
        }
        return 0;
    }
}
