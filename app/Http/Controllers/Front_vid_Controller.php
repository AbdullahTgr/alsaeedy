<?php

namespace App\Http\Controllers;
use App\Models\VideoTag;
use App\Models\VideoCategory;
use App\Models\VideoMaincategory;
use App\Models\VideoMaincategoryroot;
use App\Models\Video;
use App\Models\Clicks;

use App\Models\PostCategory;
use App\Models\Post;

use App\Channel;

use Session;
use DB;
use Hash;
use App;
use Illuminate\Support\Str; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

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
        $posts=$this->getposts();
        return redirect()->route($request->user()->role)->with('posts',$posts); 
    }
    public function getposts()
    {
        return Post::getBlogByCategory('status','active')->orderBy('id','DESC')->limit(20)->get();
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

 $posts=$this->getposts();
        return view('frontend.pages.video')->with('tags',$tags)->with('videos',$video)->with('recent_videos',$rcnt_video)->with('posts',$posts);   

        
    }

    public function videoDetail($slug){
        $video=Video::getvideoBySlug($slug);
        $rcnt_video=Video::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        // return $video;
        if(gettype($video)=='NULL'){
return view('errors.404');
        }else{
 


            $ipAddr=\Request::ip();
            $currentUserInfo = Location::get($ipAddr);
            $macAddr = exec('getmac');
         
            
    if(isset($currentUserInfo->countryName)){
        $data=[
            'post_or_vid'=>'video',
            'ref_id'=>$video->id,
            'prop1'=>$ipAddr,
            'prop2'=>$macAddr,
            'prop3'=>gethostname(),
            'prop4'=>\Request::server('HTTP_USER_AGENT'),
            
            'prop5'=>$currentUserInfo->countryName ,
            'prop6'=>$currentUserInfo->regionName ,
            'prop7'=>$currentUserInfo->cityName ,
            'prop8'=>$currentUserInfo->zipCode ,
            'prop9'=>$currentUserInfo->latitude ,
            'prop10'=>$currentUserInfo->longitude ,
    
            ]; 
    
          $check=Clicks::where('post_or_vid','video')->
            where('ref_id',$video->id)->
            where('prop1',$ipAddr)->
            where('prop2',$macAddr)->
            where('prop3',gethostname())->
    
            where('prop4',\Request::server('HTTP_USER_AGENT'))->
            where('prop5',$currentUserInfo->countryName)->
            where('prop6',$currentUserInfo->regionName)->
            where('prop7',$currentUserInfo->cityName)->
            where('prop8',$currentUserInfo->zipCode)->
            where('prop9',$currentUserInfo->latitude)->
            where('prop10',$currentUserInfo->longitude)
            ->get();
    }else{
        $data=[
            'post_or_vid'=>'video',
            'ref_id'=>$video->id,
            'prop1'=>$ipAddr,
            'prop2'=>$macAddr,
            'prop3'=>gethostname(),
            'prop4'=>\Request::server('HTTP_USER_AGENT'),
            
            ]; 
    
          $check=Clicks::where('post_or_vid','video')->
            where('ref_id',$video->id)->
            where('prop1',$ipAddr)->
            where('prop2',$macAddr)->
            where('prop3',gethostname())->
    
            where('prop4',\Request::server('HTTP_USER_AGENT'))
            ->get();
    }

 

    if(count($check)==0){
        $status=Clicks::create($data); 
        $fire=intval($video->{'description-fr'})+1;
        if($fire==Null){
            $fire=1;
        }
        $fre=Video::findOrFail($video->id);
        $datafire=['description-fr'=>$fire];
        $fre->fill($datafire)->save();
        
    }
   





            // arabic
            $posts=$this->getposts();
        return view('frontend.pages.video-detail')->with('video',$video)->with('recent_videos',$rcnt_video)->with('posts',$posts);
                
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
        $posts=$this->getposts();
        return view('frontend.pages.video') ->with('tags',$tags)->with('videos',$videos)->with('recent_videos',$rcnt_video)->with('posts',$posts);

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
            $posts=$this->getposts();
        return redirect()->route('video',$catURL.$tagURL)->with('posts',$posts);
    }

    public function videoByCategory(Request $request){
        $video=VideoCategory::getvideoByCategory($request->slug);
        $tags=VideoTag::get();

        $rcnt_video=Video::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        

            // arabic
            $posts=$this->getposts();
        return view('frontend.pages.video')->with('tags',$tags)->with('videos',$video)->with('channel',"1")->with('recent_videos',$rcnt_video)->with('posts',$posts);

    }


    


    public function videoByMaincategory(Request $request){

        $maincategories=VideoMaincategory::getVideoByMaincategory($request->slug); 
      //return $maincategories->video_maincatroot_id;
      
      
      $maincategoryroot=VideoMaincategoryroot::where('id',$maincategories->video_maincatroot_id)->first();
// return $maincategoryroot->{'title-ar'};
            // arabic
            $posts=$this->getposts();
        return view('frontend.pages.maincats')->with('maincategories',$maincategories)->with('maincategoryroot',$maincategoryroot)->with('posts',$posts);
     
        
        
      
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
