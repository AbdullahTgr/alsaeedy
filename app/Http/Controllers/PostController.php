<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts=Post::getAllPost(); 
        $tags=PostTag::get();
 
        
        // return $posts;
        return view('backend.post.index')->with('tags',$tags)->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=PostCategory::get();
        $tags=PostTag::get();
        $users=User::get(); 
        return view('backend.post.create')->with('users',$users)->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'title'=>'string|required',
            'quote'=>'string|nullable',
            'summary'=>'string|required',
            'description'=>'string|nullable',
            'photo'=>'string|nullable',
            'tags'=>'nullable',
            'added_by'=>'nullable',
            'post_cat_id'=>'required',
            'status'=>'required|in:active,inactive'
        ]);



        $old_sitemap= \Illuminate\Support\Facades\File::get('sitemap.xml');

       // $old_sitemap.='https//:adasdafeaf.com';
        $xmlObject = simplexml_load_string($old_sitemap);
                   
         $json = json_encode($xmlObject);

        $phpArray = json_decode($json, true); 

        // '{"label":["rent","heating","utilities","internet_tv" ...],"value":[435,30,0,0 ...]}';


        
 
$slug_o=Str::slug($request->{'title-ar'});
$arr=[];

$arr['loc']='https://alsaeedy.com/blog-detail/'.$slug_o;
$arr["lastmod"]="2022-07-15T17:52:41+00:00";
$arr["changefreq"]="hourly";
$arr["priority"]="1.00";


// $v=json_encode($arr);


array_push($phpArray["url"],$arr);




$top='<?xml version="1.0" encoding="UTF-8"?>
<urlset 
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<!-- created with Free Online Sitemap Generator www.xml-sitemaps.com -->

';
$middel="";
$bottom='</urlset>';


// return gettype($phpArray['url']);

// return $json;

foreach($phpArray['url'] as $jso){
  //  $jso['loc'].$jso['lastmod'].'';
  if(isset($jso['loc'])){
  $middel.='
<url>
    <loc>'.$jso['loc'].'</loc>
    <lastmod>'.$jso['lastmod'].'</lastmod>
    <changefreq>'.$jso['changefreq'].'</changefreq>
    <priority>'.$jso['priority'].'</priority>
</url>';  
  }

}



 \Illuminate\Support\Facades\File::put('sitemap.xml', $top.$middel.$bottom);

        
 
        $data=$request->all();

        if(!isset($request->added_by)){
            $data['added_by']=Auth::user()->id;
        } 
        //$slug=Str::slug($request->title.'-'.$request->{'title-ar'}.'-');
        $slug=Str::slug($request->{'title-ar'});  
        $count=Post::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;

        $tags=$request->input('tags');
        if($tags){
            $data['tags']=implode(',',$tags);
        }
        else{
            $data['tags']=''; 
        }
        // return $data;

        $status=Post::create($data);
        if($status){
            request()->session()->flash('success','Post Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        if(Auth::user()->role=='admin'){
            return redirect()->route('post.index');
        }else{
            return redirect()->route('post_m.index');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::findOrFail($id);
        $categories=PostCategory::get();
        $tags=PostTag::get();
        $users=User::get();
        return view('backend.post.edit')->with('categories',$categories)->with('users',$users)->with('tags',$tags)->with('post',$post);
     
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::findOrFail($id);
         // return $request->all();
         $this->validate($request,[
            'title'=>'string|required',
            'quote'=>'string|nullable',
            'summary'=>'string|required',
            'description'=>'string|nullable',
            'photo'=>'string|nullable',
            'tags'=>'nullable',
            'added_by'=>'nullable',
            'post_cat_id'=>'required',
            'status'=>'required|in:active,inactive'
        ]);
        if(!isset($request->added_by)){
            $data['added_by']=Auth::user()->id;
        } 
        $data=$request->all();
        $tags=$request->input('tags');
        // return $tags;
        if($tags){
            $data['tags']=implode(',',$tags);
        }
        else{
            $data['tags']='';
        }
        // return $data;

        $status=$post->fill($data)->save();
        if($status){
            request()->session()->flash('success','Post Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        if(Auth::user()->role=='admin'){
            return redirect()->route('post.index');
        }else{
            return redirect()->route('post_m.index');
       }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
       
        $status=$post->delete();
        
        if($status){
            request()->session()->flash('success','Post successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting post ');
        }
        return redirect()->route('post.index');
    }
}
