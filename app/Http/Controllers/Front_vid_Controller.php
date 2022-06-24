<?php

namespace App\Http\Controllers;
use App\Models\VideoTag;
use App\Models\VideoCategory;
use App\Models\VideoMaincategory;
use App\Models\VideoMaincategoryroot;
use App\Models\Video;


use App\Channel;

use Session;
use DB;
use Hash;
use App;
use Illuminate\Support\Str; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Front_vid_Controller extends Controller
{ 
    public function __construct()
    {
        if(session()->get('locale')==""){
            App::setLocale("ar"); 
        session()->put('locale', "ar");
        }
        
    }
   
    public function index(Request $request){
        return redirect()->route($request->user()->role); 
    }


    
    public function video(){
        $video=Video::query();
        $tags=VideoTag::get();

        
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=VideoCategory::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            return $cat_ids;
            $video->whereIn('video_cat_id',$cat_ids);
            // return $video;
        }
        if(!empty($_GET['tag'])){
            $slug=explode(',',$_GET['tag']);
            // dd($slug);
            $tag_ids=VideoTag::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // return $tag_ids;
            $video->where('video_tag_id',$tag_ids);
            // return $video;
        }

        if(!empty($_GET['show'])){
            $video=$video->where('status','active')->orderBy('id','DESC')->paginate($_GET['show']);
        }
        else{
            $video=$video->where('status','active')->orderBy('id','DESC')->paginate(9);
        }
        // $video=Video::where('status','active')->paginate(8);
        $rcnt_video=Video::where('status','active')->orderBy('id','DESC')->limit(3)->get();

        if(session()->get('locale')=="en"){
// english
        return view('frontend.pages-en.video')->with('tags',$tags)->with('videos',$video)->with('recent_videos',$rcnt_video);  
        }elseif(session()->get('locale')=="fr"){
// french
        return view('frontend.pages-fr.video')->with('tags',$tags)->with('videos',$video)->with('recent_videos',$rcnt_video);  
        }else{
// arabic
        return view('frontend.pages.video')->with('tags',$tags)->with('videos',$video)->with('recent_videos',$rcnt_video);   
        }

        
    }

    public function videoDetail($slug){
        $video=Video::getvideoBySlug($slug);
        $rcnt_video=Video::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // return $video;
        if(gettype($video)=='NULL'){
return view('errors.404');
        }else{
  if(session()->get('locale')=="en"){
            // english
        return view('frontend.pages-en.video-detail')->with('video',$video)->with('recent_videos',$rcnt_video);
                    }elseif(session()->get('locale')=="fr"){
            // french
        return view('frontend.pages-fr.video-detail')->with('video',$video)->with('recent_videos',$rcnt_video);
                    }else{
            // arabic
        return view('frontend.pages.video-detail')->with('video',$video)->with('recent_videos',$rcnt_video);
                   }
        }
      
    }

    public function videoSearch(Request $request){
        // return $request->all();
        $rcnt_video=Video::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $tags=VideoTag::get();

        $videos=Video::orwhere('title','like','%'.$request->search.'%')
            ->orwhere('quote','like','%'.$request->search.'%')
            ->orwhere('summary','like','%'.$request->search.'%')
            ->orwhere('description','like','%'.$request->search.'%')
            ->orwhere('slug','like','%'.$request->search.'%')
            ->orderBy('id','DESC')
           
            ->paginate(8);
        
        return view('frontend.pages.video') ->with('tags',$tags)->with('videos',$videos)->with('recent_videos',$rcnt_video);

    }

    public function VideoFilter(Request $request){
        $data=$request->all();
        
        // return $data;
        $catURL="";
        if(!empty($data['category'])){
            foreach($data['category'] as $category){
                if(empty($catURL)){
                    $catURL .='&category='.$category;
                }
                else{
                    $catURL .=','.$category;
                }
            }
        }

        $tagURL="";
        if(!empty($data['tag'])){ 
            foreach($data['tag'] as $tag){
                if(empty($tagURL)){
                    $tagURL .='&tag='.$tag;
                }
                else{
                    $tagURL .=','.$tag; 
                }
            }
        } 
        // return $tagURL;
            // return $catURL;
        return redirect()->route('video',$catURL.$tagURL);
    }

    public function videoByCategory(Request $request){
        $video=VideoCategory::getvideoByCategory($request->slug);
        $tags=VideoTag::get();

        $rcnt_video=Video::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        
        if(session()->get('locale')=="en"){ 
            // english
        return view('frontend.pages-en.video')->with('tags',$tags)->with('videos',$video->video)->with('recent_videos',$rcnt_video);
                    }elseif(session()->get('locale')=="fr"){
            // french
        return view('frontend.pages-fr.video')->with('tags',$tags)->with('videos',$video->video)->with('recent_videos',$rcnt_video);
                    }else{
            // arabic
        return view('frontend.pages.video')->with('tags',$tags)->with('videos',$video->video)->with('recent_videos',$rcnt_video);
                   }
    }


    


    public function videoByMaincategory(Request $request){

        $maincategories=VideoMaincategory::getVideoByMaincategory($request->slug); 
        $maincatrootid=VideoMaincategory::where('slug',$request->slug)->first();

        $mc_id=$maincatrootid->video_maincatroot_id;

        $maincategoryroot=VideoMaincategoryroot::where('id',$mc_id)->first();


        
        
            // arabic
        return view('frontend.pages.maincats')->with('maincategories',$maincategories)->with('maincategoryroot',$maincategoryroot);
     
        
        
      
    }
    
    











    public function VideoByTag(Request $request){
        // dd($request->slug);
        $video=Video::getvideoByTag($request->slug);
        // return $video;
        $rcnt_video=Video::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $tags=VideoTag::get();
        
        if(session()->get('locale')=="en"){
            // english
        return view('frontend.pages-en.video')->with('tags',$tags)->with('videos',$video)->with('recent_videos',$rcnt_video);
                    }elseif(session()->get('locale')=="fr"){
            // french
        return view('frontend.pages-fr.video')->with('tags',$tags)->with('videos',$video)->with('recent_videos',$rcnt_video);
                    }else{
            // arabic
        return view('frontend.pages.video')->with('tags',$tags)->with('videos',$video)->with('recent_videos',$rcnt_video);
                   }
    }



/////////////////////////////////////////////////


    
}
