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

    static public function setvirtualuser(){

        $ipAddr=\Request::ip();
        $currentUserInfo = Location::get($ipAddr);
        $macAddr = exec('getmac');


if(isset($currentUserInfo->countryName)){
    $data=[
        'post_or_vid'=>'general',
        'ref_id'=>'0',
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

      $check=Clicks::where('post_or_vid','general')->
        where('ref_id','0')->
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
        'ref_id'=>'0',
        'prop1'=>$ipAddr,
        'prop2'=>$macAddr,
        'prop3'=>gethostname(),
        'prop4'=>\Request::server('HTTP_USER_AGENT'),

        ];

      $check=Clicks::where('post_or_vid','post')->
        where('ref_id','0')->
        where('prop1',$ipAddr)->
        where('prop2',$macAddr)->
        where('prop3',gethostname())->

        where('prop4',\Request::server('HTTP_USER_AGENT'))
        ->get();
}





        if(count($check)==0){
            session()->put('virtual_user',Clicks::create($data)->id);

        }else{
            session()->put('virtual_user', $check[0]->id);
            session()->get('virtual_user');
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


        $news=$this->getposts();

        $hotposts=Post::getBlogByCategory('status','active')->orderBy('description-fr','DESC')->limit(4)->get();


        $maincatroot = VideoMaincategoryroot::with('maincategory')->get();

        $maincat = VideoMaincategory::get();
        $cat = VideoCategory::get();

        $videos = Video::orderBy('description-fr','DESC')->limit(4)->get();

        // get post by category
        $category=Category::where('status','active')->where('is_parent',1)->orderBy('title','ASC')->get();
















        // return $category;
        return view('frontend.index')
        ->with('news',$news)
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
            $news=$this->getposts();

        return view('frontend.pages.about-us')->with('news',$news);

    }
    public function terms(){
        $news=$this->getposts();
        return view('frontend.pages.terms')->with('news',$news);

    }
    public function policy(){
        $news=$this->getposts();
        return view('frontend.pages.policy')->with('news',$news);

    }

    public function contact(){

            // arabic
            $news=$this->getposts();
        return view('frontend.pages.contact')->with('news',$news);

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

$news=$this->getposts();
        // arabic
        return view('frontend.pages.blog')->with('tags',$tags)->with('posts',$post)->with('recent_posts',$rcnt_post)->with('news',$news);

    }

    public function gm(){
        $news=$this->getposts();
        return view('frontend.pages.gm')->with('news',$news);
    }





    public function logout(){
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return back();
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
            $news=$this->getposts();
        return view('frontend.pages.blog-detail')->with('post',$post)->with('recent_posts',$rcnt_post)->with('news',$news);

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
        $news=$this->getposts();
        return view('frontend.pages.blog') ->with('tags',$tags)->with('news',$news)->with('recent_posts',$rcnt_post)->with('posts',$posts);


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
            $news=$this->getposts();
        return redirect()->route('blog',$catURL.$tagURL)->with('news',$news);
    }

    public function blogByCategory(Request $request){
        $post=PostCategory::getBlogByCategory($request->slug);
        $tags=PostTag::get();

        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $news=$this->getposts();
        return view('frontend.pages.blog')->with('tags',$tags)->with('posts',$post->post)->with('recent_posts',$rcnt_post)->with('news',$news);

    }

    public function blogByTag(Request $request){
        // dd($request->slug);
        $post=Post::getBlogByTag($request->slug);
        // return $post;
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $tags=PostTag::get();
$news=$this->getposts();
        return view('frontend.pages.blog')->with('tags',$tags)->with('posts',$post)->with('recent_posts',$rcnt_post)->with('news',$news);

    }



/////////////////////////////////////////////////




public function writers(){

    $writers=User::GetWritersposts();
        // arabic
        $news=$this->getposts();
    return view('frontend.pages.writers')->with('writers',$writers)->with('news',$news);
}

public function writer(Request $request){
     $writer=User::GetWriterposts($request->slug);
        // arabic
        $news=$this->getposts();
    return view('frontend.pages.writer')->with('writer',$writer)->with('news',$news);
}

public function eid(){

    $writers=User::GetWritersposts();
        // arabic
        $news=$this->getposts();
    return view('frontend.pages.eid')->with('news',$news);
}

public function eid_name(Request $request){
        // arabic
        $news=$this->getposts();
    return view('frontend.pages.eid_name')->with('name',$request->name)->with('news',$news);
}
























public function productDetail($slug){
    $this->setvirtualuser();
     $product_detail= Product::getProductBySlug($slug);
     $news=$this->getposts();
    // dd($product_detail);

    return view('frontend.pages.product_detail')->with('product_detail',$product_detail)->with('news',$news);

}

public function productGrids(){
    $products=Product::query();

    if(!empty($_GET['category'])){
        $slug=explode(',',$_GET['category']);
        // dd($slug);
        $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
        // dd($cat_ids);
        $products->whereIn('cat_id',$cat_ids);
        // return $products;
    }
    if(!empty($_GET['brand'])){
        $slugs=explode(',',$_GET['brand']);
        $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
        return $brand_ids;
        $products->whereIn('brand_id',$brand_ids);
    }
    if(!empty($_GET['sortBy'])){
        if($_GET['sortBy']=='title'){
            $products=$products->where('status','active')->orderBy('title','ASC');
        }
        if($_GET['sortBy']=='price'){
            $products=$products->orderBy('price','ASC');
        }
    }

    if(!empty($_GET['price'])){
        $price=explode('-',$_GET['price']);
        // return $price;
        // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));
        // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));

        $products->whereBetween('price',$price);
    }

    $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
    // Sort by number
    if(!empty($_GET['show'])){
        $products=$products->where('status','active')->paginate($_GET['show']);
    }
    else{
        $products=$products->where('status','active')->paginate(9);
    }
    // Sort by name , price, category


    if(session()->get('locale')=="en"){
        // english
    return view('frontend.pages-en.product-grids')->with('products',$products)->with('recent_products',$recent_products);
                }elseif(session()->get('locale')=="fr"){
        // french
    return view('frontend.pages-fr.product-grids')->with('products',$products)->with('recent_products',$recent_products);
                }else{
        // arabic
    return view('frontend.pages.product-grids')->with('products',$products)->with('recent_products',$recent_products);
               }
}
public function productLists(){
    $products=Product::query();

    if(!empty($_GET['category'])){
        $slug=explode(',',$_GET['category']);
        // dd($slug);
        $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
        // dd($cat_ids);
        $products->whereIn('cat_id',$cat_ids)->paginate;
        // return $products;
    }
    if(!empty($_GET['brand'])){
        $slugs=explode(',',$_GET['brand']);
        $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
        return $brand_ids;
        $products->whereIn('brand_id',$brand_ids);
    }
    if(!empty($_GET['sortBy'])){
        if($_GET['sortBy']=='title'){
            $products=$products->where('status','active')->orderBy('title','ASC');
        }
        if($_GET['sortBy']=='price'){
            $products=$products->orderBy('price','ASC');
        }
    }

    if(!empty($_GET['price'])){
        $price=explode('-',$_GET['price']);
        // return $price;
        // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));
        // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));

        $products->whereBetween('price',$price);
    }

    $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
    // Sort by number
    if(!empty($_GET['show'])){
        $products=$products->where('status','active')->paginate($_GET['show']);
    }
    else{
        $products=$products->where('status','active')->paginate(6);
    }
    // Sort by name , price, category


    if(session()->get('locale')=="en"){
        // english
    return view('frontend.pages-en.product-lists')->with('products',$products)->with('recent_products',$recent_products);
                }elseif(session()->get('locale')=="fr"){
        // french
    return view('frontend.pages-fr.product-lists')->with('products',$products)->with('recent_products',$recent_products);
                }else{
        // arabic
    return view('frontend.pages.product-lists')->with('products',$products)->with('recent_products',$recent_products);
               }
}
public function productFilter(Request $request){
        $data= $request->all();
        // return $data;
        $showURL="";
        if(!empty($data['show'])){
            $showURL .='&show='.$data['show'];
        }

        $sortByURL='';
        if(!empty($data['sortBy'])){
            $sortByURL .='&sortBy='.$data['sortBy'];
        }

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

        $brandURL="";
        if(!empty($data['brand'])){
            foreach($data['brand'] as $brand){
                if(empty($brandURL)){
                    $brandURL .='&brand='.$brand;
                }
                else{
                    $brandURL .=','.$brand;
                }
            }
        }
        // return $brandURL;

        $priceRangeURL="";
        if(!empty($data['price_range'])){
            $priceRangeURL .='&price='.$data['price_range'];
        }
        if(request()->is('النماء.loc/product-grids')){
            return redirect()->route('product-grids',$catURL.$brandURL.$priceRangeURL.$showURL.$sortByURL);
        }
        else{
            return redirect()->route('product-lists',$catURL.$brandURL.$priceRangeURL.$showURL.$sortByURL);
        }
}
public function productSearch(Request $request){
    $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
    $products=Product::orwhere('title','like','%'.$request->search.'%')
                ->orwhere('slug','like','%'.$request->search.'%')
                ->orwhere('description','like','%'.$request->search.'%')
                ->orwhere('summary','like','%'.$request->search.'%')
                ->orwhere('price','like','%'.$request->search.'%')
                ->orderBy('id','DESC')
                ->paginate('9');
    if(session()->get('locale')=="en"){
        // english
    return view('frontend.pages-en.product-grids')->with('products',$products)->with('recent_products',$recent_products);
                }elseif(session()->get('locale')=="fr"){
        // french
    return view('frontend.pages-fr.product-grids')->with('products',$products)->with('recent_products',$recent_products);
                }else{
        // arabic
    return view('frontend.pages.product-grids')->with('products',$products)->with('recent_products',$recent_products);
               }
}

public function productBrand(Request $request){
    $products=Brand::getProductByBrand($request->slug);
    $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();
    if(request()->is('النماء.loc/product-grids')){
        if(session()->get('locale')=="en"){
            // english
        return view('frontend.pages-en.product-grids')->with('products',$products->products)->with('recent_products',$recent_products);
                    }elseif(session()->get('locale')=="fr"){
            // french
        return view('frontend.pages-fr.product-grids')->with('products',$products->products)->with('recent_products',$recent_products);
                    }else{
            // arabic
        return view('frontend.pages.product-grids')->with('products',$products->products)->with('recent_products',$recent_products);
                   }
    }
    else{
        if(session()->get('locale')=="en"){
            // english
        return view('frontend.pages-en.product-lists')->with('products',$products->products)->with('recent_products',$recent_products);
                    }elseif(session()->get('locale')=="fr"){
            // french
        return view('frontend.pages-en.product-lists')->with('products',$products->products)->with('recent_products',$recent_products);
                    }else{
            // arabic
        return view('frontend.pages.product-lists')->with('products',$products->products)->with('recent_products',$recent_products);
                   }
    }

}
public function productCat(Request $request){
    $products=Category::getProductByCat($request->slug);
    // return $request->slug;
    $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();

    if(request()->is('النماء.loc/product-grids')){
        if(session()->get('locale')=="en"){
            // english
        return view('frontend.pages-en.product-grids')->with('products',$products->products)->with('recent_products',$recent_products);
                    }elseif(session()->get('locale')=="fr"){
            // french
        return view('frontend.pages-fr.product-grids')->with('products',$products->products)->with('recent_products',$recent_products);
                    }else{
            // arabic
        return view('frontend.pages.product-grids')->with('products',$products->products)->with('recent_products',$recent_products);
                   }
    }
    else{
        if(session()->get('locale')=="en"){
            // english
        return view('frontend.pages-en.product-lists')->with('products',$products->products)->with('recent_products',$recent_products);
                    }elseif(session()->get('locale')=="fr"){
            // french
        return view('frontend.pages-fr.product-lists')->with('products',$products->products)->with('recent_products',$recent_products);
                    }else{
            // arabic
        return view('frontend.pages.product-lists')->with('products',$products->products)->with('recent_products',$recent_products);
                   }
    }

}
public function productSubCat(Request $request){
    $products=Category::getProductBySubCat($request->sub_slug);
    // return $products;
    $recent_products=Product::where('status','active')->orderBy('id','DESC')->limit(3)->get();

    if(request()->is('النماء.loc/product-grids')){
        if(session()->get('locale')=="en"){
            // english
        return view('frontend.pages-en.product-grids')->with('products',$products->sub_products)->with('recent_products',$recent_products);
                    }elseif(session()->get('locale')=="fr"){
            // french
        return view('frontend.pages-fr.product-grids')->with('products',$products->sub_products)->with('recent_products',$recent_products);
                    }else{
            // arabic
        return view('frontend.pages.product-grids')->with('products',$products->sub_products)->with('recent_products',$recent_products);
                   }
    }
    else{
        if(session()->get('locale')=="en"){
            // english
        return view('frontend.pages-en.product-lists')->with('products',$products->sub_products)->with('recent_products',$recent_products);
                    }elseif(session()->get('locale')=="fr"){
            // french
        return view('frontend.pages-fr.product-lists')->with('products',$products->sub_products)->with('recent_products',$recent_products);
                    }else{
            // arabic
        return view('frontend.pages.product-lists')->with('products',$products->sub_products)->with('recent_products',$recent_products);
                   }
    }

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
