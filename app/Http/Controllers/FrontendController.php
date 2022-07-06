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

    

    public function home(Video $video){ 
        $categories=PostCategory::get();
        
        $posts=Post::where('status','active')->orderBy('id','DESC')->limit(30)->get();
        $banners=Banner::where('status','active')->limit(3)->orderBy('id','DESC')->get();
        $tags=PostTag::get();

       
        

        $maincatroot = VideoMaincategoryroot::with('maincategory')->get(); 
        
        $maincat = VideoMaincategory::get();
        $cat = VideoCategory::get();

        $videos = Video::orderBy('id','DESC')->limit(4)->get();
        
        // return $banner;
        $category=Category::where('status','active')->where('is_parent',1)->orderBy('title','ASC')->get();

        // return $category;
        return view('frontend.index')
                ->with('posts',$posts)
                ->with('banners',$banners)
                ->with('categories',$categories)
                ->with('tags',$tags)
                ->with('maincatroot',$maincatroot)
                ->with('maincat',$maincat)
                ->with('cat',$cat)
                ->with('videos',$videos)
                ->with('category_lists',$category);
    }   

    public function aboutUs(){
        if(session()->get('locale')=="en"){
            // english
        return view('frontend.pages-en.about-us');
                    }elseif(session()->get('locale')=="fr"){
            // french
        return view('frontend.pages-fr.about-us');
                    }else{
            // arabic
        return view('frontend.pages.about-us');
                   }
    }
    public function terms(){
        return view('frontend.pages.terms');
    
    }
    public function policy(){
        return view('frontend.pages.policy');
    
    }

    public function contact(){
        if(session()->get('locale')=="en"){
            // english
        return view('frontend.pages-en.contact');
                    }elseif(session()->get('locale')=="fr"){
            // french
        return view('frontend.pages-fr.contact');
                    }else{
            // arabic
        return view('frontend.pages.contact');
                   }
    }

    public function productDetail($slug){
        $product_detail= Product::getProductBySlug($slug);
        // dd($product_detail);
        if(session()->get('locale')=="en"){
            // english
        return view('frontend.pages-en.product_detail')->with('product_detail',$product_detail);
                    }elseif(session()->get('locale')=="fr"){
            // french
        return view('frontend.pages-fr.product_detail')->with('product_detail',$product_detail);
                    }else{
            // arabic
        return view('frontend.pages.product_detail')->with('product_detail',$product_detail);
                   }
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

        if(session()->get('locale')=="en"){
// english
        return view('frontend.pages-en.blog')->with('tags',$tags)->with('posts',$post)->with('recent_posts',$rcnt_post);  
        }elseif(session()->get('locale')=="fr"){
// french
        return view('frontend.pages-fr.blog')->with('tags',$tags)->with('posts',$post)->with('recent_posts',$rcnt_post);  
        }else{
// arabic
        return view('frontend.pages.blog')->with('tags',$tags)->with('posts',$post)->with('recent_posts',$rcnt_post);   
        }

        
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
        }
       

        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
            // arabic
        return view('frontend.pages.blog-detail')->with('post',$post)->with('recent_posts',$rcnt_post);
                
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
        
        if(session()->get('locale')=="en"){
            // english
        return view('frontend.pages-en.blog')->with('posts',$posts)->with('recent_posts',$rcnt_post);
                    }elseif(session()->get('locale')=="fr"){
            // french
        return view('frontend.pagesfr.blog')->with('posts',$posts)->with('recent_posts',$rcnt_post);
                    }else{
            // arabic
        return view('frontend.pages.blog') ->with('tags',$tags)->with('posts',$posts)->with('recent_posts',$rcnt_post);
                   }

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
        return redirect()->route('blog',$catURL.$tagURL);
    }

    public function blogByCategory(Request $request){
        $post=PostCategory::getBlogByCategory($request->slug);
        $tags=PostTag::get();

        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        
        if(session()->get('locale')=="en"){
            // english
        return view('frontend.pages-en.blog')->with('tags',$tags)->with('posts',$post->post)->with('recent_posts',$rcnt_post);
                    }elseif(session()->get('locale')=="fr"){
            // french
        return view('frontend.pages-fr.blog')->with('tags',$tags)->with('posts',$post->post)->with('recent_posts',$rcnt_post);
                    }else{
            // arabic
        return view('frontend.pages.blog')->with('tags',$tags)->with('posts',$post->post)->with('recent_posts',$rcnt_post);
                   }
    }

    public function blogByTag(Request $request){
        // dd($request->slug);
        $post=Post::getBlogByTag($request->slug);
        // return $post;
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $tags=PostTag::get();
        
        if(session()->get('locale')=="en"){
            // english
        return view('frontend.pages-en.blog')->with('tags',$tags)->with('posts',$post)->with('recent_posts',$rcnt_post);
                    }elseif(session()->get('locale')=="fr"){
            // french
        return view('frontend.pages-fr.blog')->with('tags',$tags)->with('posts',$post)->with('recent_posts',$rcnt_post);
                    }else{
            // arabic
        return view('frontend.pages.blog')->with('tags',$tags)->with('posts',$post)->with('recent_posts',$rcnt_post);
                   }
    }



/////////////////////////////////////////////////












































    // Login
    public function login(){
        return view('frontend.pages.login'); 
    }

    
    public function loginSubmit(Request $request){
        $data= $request->all();
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'status'=>'active'])){
            Session::put('user',$data['email']); 
            request()->session()->flash('success','Successfully login');
            return redirect()->route('home');
        } 
        else{
            request()->session()->flash('error','Invalid email and password pleas try again!');
            return redirect()->back();
        }
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function register(){
        return view('frontend.pages.register');
    }

    public function registerSubmit(Request $request){
        // return $request->all();
        $this->validate($request,[
            'name'=>'string|required|min:2',
            'email'=>'string|required|unique:users,email',
            'password'=>'required|min:6|confirmed',
        ]);
        $data=$request->all();
        // dd($data);
        $check=$this->create($data);
       if($check){
        $this->loginSubmit($request);
        return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Please try again!');
            return back();
        }
    }










    public function logout(){
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return back();
    }


    public function create(array $data){
        return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'status'=>'active'
            ]);
    }
    // Reset password
    public function showResetForm(){
        return view('auth.passwords.old-reset');
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
