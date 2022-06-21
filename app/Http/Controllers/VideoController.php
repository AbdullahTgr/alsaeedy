<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Video;
use App\Models\VideoCategory;
use App\Models\VideoTag;
use App\User;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $videos=Video::getAllvideo(); 
        $tags=VideoTag::get();
 
        
        // return $videos;
        return view('backend.video.index')->with('tags',$tags)->with('videos',$videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=VideoCategory::get();
        $tags=VideoTag::get();
        $users=User::get(); 
        return view('backend.video.create')->with('users',$users)->with('categories',$categories)->with('tags',$tags);
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
            'title-ar'=>'string|required',
            'description-ar'=>'string|nullable',
            'tags'=>'nullable',
            'added_by'=>'nullable',
            'video_cat_id'=>'required',
            'status'=>'required|in:active,inactive'
        ]);

        $data=$request->all();

        if(!isset($request->added_by)){
            $data['added_by']=Auth::user()->id;
        } 
        $slug=Str::slug($request->{'title-ar'}); 
        $count=Video::where('slug',$slug)->count();
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

        $status=Video::create($data);
        if($status){
            request()->session()->flash('success','video Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        if(Auth::user()->role=='admin'){
            return redirect()->route('video.index');
        }else{
            return redirect()->route('video_m.index');
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
        $video=Video::findOrFail($id);
        $categories=VideoCategory::get();
        $tags=VideoTag::get();
        $users=User::get();
        return view('backend.video.edit')->with('categories',$categories)->with('users',$users)->with('tags',$tags)->with('video',$video);
     
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
        $video=Video::findOrFail($id);
         // return $request->all();
         $this->validate($request,[
            'title-ar'=>'string|required',
            
            'tags'=>'nullable',
            'added_by'=>'nullable',
            'video_cat_id'=>'required',
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

        $status=$video->fill($data)->save();
        if($status){
            request()->session()->flash('success','video Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        if(Auth::user()->role=='admin'){
            return redirect()->route('video.index');
        }else{
            return redirect()->route('video_m.index');
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
        
        $video=Video::findOrFail($id); 
       
        $status=$video->delete(); 
        
        if($status){
            request()->session()->flash('success','video successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting video ');
        }
        return redirect()->route('video.index');
    }
}
