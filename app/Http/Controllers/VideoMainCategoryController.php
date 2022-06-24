<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoMaincategory;
use App\Models\VideoMaincategoryroot;
use Illuminate\Support\Str;
class VideoMaincategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videomaincategory=VideoMainCategory::orderBy('id','DESC')->paginate(10);
        return view('backend.videomaincategory.index')->with('videomaincategories',$videomaincategory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maincategoryroot=VideoMaincategoryroot::get();
        return view('backend.videomaincategory.create')->with('maincategoryroot',$maincategoryroot);
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
        $count=Videomaincategory::where('slug',$slug)->count(); 
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
            
     
        }
        $data['slug']=$slug;
        $status=Videomaincategory::create($data);
        if($status){
            request()->session()->flash('success','video Main Category Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('video-maincategory.index');
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
        

        $videomaincategories=Videomaincategory::findOrFail($id);
        return view('backend.videomaincategory.edit')->with('videomaincategories',$videomaincategories);
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
        $videomaincategory=Videomaincategory::findOrFail($id);
         // return $request->all();
         $this->validate($request,[
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all(); 
        $status=$videomaincategory->fill($data)->save();  
        if($status){
            request()->session()->flash('success','video Main Category Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        } 
        return redirect()->route('video-maincategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $videomaincategory=Videomaincategory::findOrFail($id);
       
        $status=$videomaincategory->delete();
        
        if($status){
            request()->session()->flash('success','video Main Category successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting video category');
        }
        return redirect()->route('video-maincategory.index');
    }
}
