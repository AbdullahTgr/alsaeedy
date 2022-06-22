<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoMaincategoryroot;
use Illuminate\Support\Str;
class VideoMaincategoryrootController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videomaincategoryroot=VideoMaincategoryroot::orderBy('id','DESC')->paginate(10);
        return view('backend.videomaincategoryroot.index')->with('videomaincategories',$videomaincategoryroot);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.videomaincategoryroot.create');
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
        $count=VideoMaincategoryroot::where('slug',$slug)->count(); 
        if($count>0){
            //$slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
            
        $slug=Str::slug($request->{'title-ar'}); 

        }
        $data['slug']=$slug;
        $status=VideoMaincategoryroot::create($data);
        if($status){
            request()->session()->flash('success','video Main Category Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('video-maincategoryroot.index');
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
        $videomaincategory=VideoMaincategoryroot::findOrFail($id);
        return view('backend.videomaincategoryroot.edit')->with('videomaincategoryroot',$videomaincategoryroot);
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
        $videomaincategoryroot=VideoMaincategoryroot::findOrFail($id);
         // return $request->all();
         $this->validate($request,[
            'status'=>'required|in:active,inactive'
        ]);
        $data=$request->all();
        $status=$videomaincategoryroot->fill($data)->save();
        if($status){
            request()->session()->flash('success','video Main Category Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('video-maincategoryroot.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $videomaincategoryroot=VideoMaincategoryroot::findOrFail($id);
       
        $status=$videomaincategoryroot->delete();
        
        if($status){
            request()->session()->flash('success','video Main Category successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting video category');
        }
        return redirect()->route('video-maincategoryroot.index');
    }
}
