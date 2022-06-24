<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoCategory;
use App\Models\VideoMaincategory;
use Illuminate\Support\Str;
class VideoCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $videoCategories=VideoCategory::orderBy('id','DESC')->paginate(10);
        return view('backend.videocategory.index')->with('videoCategories',$videoCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $videocategory=VideoMaincategory::orderBy('id','DESC')->paginate(10);
        return view('backend.videocategory.create')->with('videocategory',$videocategory);
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
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        $slug=Str::slug($request->{'title-ar'});  
        $count=VideoCategory::where('slug',$slug)->count(); 
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
            
 
        }
        $data['slug']=$slug;
        $status=VideoCategory::create($data);
        if($status){
            request()->session()->flash('success','video Category Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('video-category.index');
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
        $videoCategory=VideoCategory::findOrFail($id);
        return view('backend.videocategory.edit')->with('videoCategory',$videoCategory);
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
        $videoCategory=VideoCategory::findOrFail($id);
         // return $request->all();
         $this->validate($request,[
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        $status=$videoCategory->fill($data)->save();
        if($status){
            request()->session()->flash('success','video Category Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('video-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $videoCategory=VideoCategory::findOrFail($id);
       
        $status=$videoCategory->delete();
        
        if($status){
            request()->session()->flash('success','video Category successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting video category');
        }
        return redirect()->route('video-category.index');
    }
}
