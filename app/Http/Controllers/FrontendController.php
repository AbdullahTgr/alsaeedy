<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\PostTag;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Cart;
use App\Models\Brand;
use App\Models\Video;
use App\Models\Clicks;
use App\User;


use App\Channel;

use Session;  
use Newsletter;
use DB;
use Hash;
use App;
use App\Models\VideoCategory;
use App\Models\VideoMaincategory;
use App\Models\VideoMaincategoryroot;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Stevebauman\Location\Facades\Location;

class FrontendController extends Controller
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

    public function getposts()
    {
        return Post::getBlogByCategory('status','active')->orderBy('id','DESC')->limit(20)->get();
    }

    public function home(Video $video){ 
        $categories=PostCategory::get();
        
        // $posts=Post::where('status','active')->orderBy('id','DESC')->limit(20)->get();
        
        $banners=Banner::where('status','active')->limit(3)->orderBy('id','DESC')->get();
        $tags=PostTag::get();

        
        $posts=$this->getposts();
        
        $hotposts=Post::getBlogByCategory('status','active')->orderBy('description-fr','DESC')->limit(4)->get();
        

        $maincatroot = VideoMaincategoryroot::with('maincategory')->get(); 
        
        $maincat = VideoMaincategory::get();
        $cat = VideoCategory::get();

        $videos = Video::orderBy('description-fr','DESC')->limit(4)->get();
        
        // get post by category
        $category=Category::where('status','active')->where('is_parent',1)->orderBy('title','ASC')->get();

        // return $category;
        return view('frontend.index')
        ->with('posts',$posts)
        // ->with('posts_o',$posts_o)
                ->with('banners',$banners)
                ->with('categories',$categories)
                ->with('tags',$tags)
                ->with('maincatroot',$maincatroot)
                ->with('maincat',$maincat)
                ->with('cat',$cat)
                ->with('videos',$videos)
                ->with('hotposts',$hotposts)
                ->with('category_lists',$category);
    }   

    public function aboutUs(){

            // arabic
            $posts=$this->getposts();

        return view('frontend.pages.about-us')->with('posts',$posts);
            
    }
    public function terms(){
        $posts=$this->getposts();
        return view('frontend.pages.terms')->with('posts',$posts);
    
    }
    public function policy(){
        $posts=$this->getposts();
        return view('frontend.pages.policy')->with('posts',$posts);
    
    }

    public function contact(){

            // arabic
            $posts=$this->getposts();
        return view('frontend.pages.contact')->with('posts',$posts);
                   
    }


    

    public function blog(){
        $post=Post::query();
        $tags=PostTag::get();

        
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            // dd($slug);
            $cat_ids=PostCategory::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            return $cat_ids;
            $post->whereIn('post_cat_id',$cat_ids);
            // return $post;
        }
        if(!empty($_GET['tag'])){
            $slug=explode(',',$_GET['tag']);
            // dd($slug);
            $tag_ids=PostTag::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            // return $tag_ids;
            $post->where('post_tag_id',$tag_ids);
            // return $post;
        }

        if(!empty($_GET['show'])){
            $post=$post->where('status','active')->orderBy('id','DESC')->paginate($_GET['show']);
        }
        else{
            $post=$post->where('status','active')->orderBy('id','DESC')->paginate(30);
        }
        // $post=Post::where('status','active')->paginate(8);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();

$posts=$this->getposts();
        // arabic
        return view('frontend.pages.blog')->with('tags',$tags)->with('posts',$post)->with('recent_posts',$rcnt_post)->with('posts',$posts);   

    }

    public function blogDetail($slug){
        $post=Post::getPostBySlug($slug);

        if(gettype($post)=='NULL'){
return view('errors.404'); 
        }else{

        $ipAddr=\Request::ip();
        $currentUserInfo = Location::get($ipAddr);
        $macAddr = exec('getmac');
     
        
if(isset($currentUserInfo->countryName)){
    $data=[
        'post_or_vid'=>'post',
        'ref_id'=>$post->id,
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

      $check=Clicks::where('post_or_vid','post')->
        where('ref_id',$post->id)->
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
        'post_or_vid'=>'post',
        'ref_id'=>$post->id,
        'prop1'=>$ipAddr,
        'prop2'=>$macAddr,
        'prop3'=>gethostname(),
        'prop4'=>\Request::server('HTTP_USER_AGENT'),
        
        ]; 

      $check=Clicks::where('post_or_vid','post')->
        where('ref_id',$post->id)->
        where('prop1',$ipAddr)->
        where('prop2',$macAddr)->
        where('prop3',gethostname())->

        where('prop4',\Request::server('HTTP_USER_AGENT'))
        ->get();
}
        
        
        
     

        if(count($check)==0){
            $status=Clicks::create($data); 

            $fire=intval($post->{'description-fr'})+1;
            if($fire==Null){
                $fire=1;
            }
            $fre=Post::findOrFail($post->id);
            $datafire=['description-fr'=>$fire];
            $fre->fill($datafire)->save();
            
        }
       

        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
            // arabic
            $posts=$this->getposts();
        return view('frontend.pages.blog-detail')->with('post',$post)->with('recent_posts',$rcnt_post)->with('posts',$posts);
                
        }
      
    }

    public function blogSearch(Request $request){
        // return $request->all();
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $tags=PostTag::get();

        $posts=Post::orwhere('title','like','%'.$request->search.'%')
            ->orwhere('quote','like','%'.$request->search.'%')
            ->orwhere('summary','like','%'.$request->search.'%')
            ->orwhere('description','like','%'.$request->search.'%')
            ->orwhere('slug','like','%'.$request->search.'%')
            ->orderBy('id','DESC')
           
            ->paginate(8);
        $posts=$this->getposts();
        return view('frontend.pages.blog') ->with('tags',$tags)->with('posts',$posts)->with('recent_posts',$rcnt_post)->with('posts',$posts);
                   

    }

    public function blogFilter(Request $request){
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
        return redirect()->route('blog',$catURL.$tagURL)->with('posts',$posts);
    }

    public function blogByCategory(Request $request){
        $post=PostCategory::getBlogByCategory($request->slug);
        $tags=PostTag::get();

        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $posts=$this->getposts();
        return view('frontend.pages.blog')->with('tags',$tags)->with('posts',$post->post)->with('recent_posts',$rcnt_post)->with('posts',$posts);
                   
    }

    public function blogByTag(Request $request){
        // dd($request->slug);
        $post=Post::getBlogByTag($request->slug);
        // return $post;
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $tags=PostTag::get();
$posts=$this->getposts();
        return view('frontend.pages.blog')->with('tags',$tags)->with('posts',$post)->with('recent_posts',$rcnt_post)->with('posts',$posts);
                   
    }



/////////////////////////////////////////////////




public function writers(){

    $writers=User::GetWritersposts(); 
        // arabic
        $posts=$this->getposts();
    return view('frontend.pages.writers')->with('writers',$writers)->with('posts',$posts);
}

public function writer(Request $request){
     $writer=User::GetWriterposts($request->slug); 
        // arabic
        $posts=$this->getposts();
    return view('frontend.pages.writer')->with('writer',$writer)->with('posts',$posts);
}

public function eid(){

    $writers=User::GetWritersposts(); 
        // arabic
        $posts=$this->getposts();
    return view('frontend.pages.eid')->with('posts',$posts);
}

public function eid_name(Request $request){
        // arabic
        $posts=$this->getposts();
    return view('frontend.pages.eid_name')->with('name',$request->name)->with('posts',$posts);
}














































    public function subscribe(Request $request){
        if(! Newsletter::isSubscribed($request->email)){
                Newsletter::subscribePending($request->email);
                if(Newsletter::lastActionSucceeded()){
                    request()->session()->flash('success','Subscribed! Please check your email');
                    return redirect()->route('home');
                }
                else{
                    Newsletter::getLastError();
                    return back()->with('error','Something went wrong! please try again');
                }
            }
            else{
                request()->session()->flash('error','Already Subscribed');
                return back();
            }
    }
    
}
