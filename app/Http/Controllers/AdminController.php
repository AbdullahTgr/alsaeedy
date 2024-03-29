<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\User;
use App\Rules\MatchOldPassword;
use Hash;
use Carbon\Carbon;
use App\Models\Clicks;
use App\Models\Post;
use App\Models\Video;

use Spatie\Activitylog\Models\Activity;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $data = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();
     $array[] = ['Name', 'Number'];
     foreach($data as $key => $value)
     {
       $array[++$key] = [$value->day_name, $value->count];
     }
    //  return $data;
     return view('backend.index')->with('users', json_encode($array));
    }

    public function profile(){
        $profile=Auth()->user();
        // return $profile;
        return view('backend.users.profile')->with('profile',$profile);
    }
    public function filemanager(){
        return view('backend.layouts.file-manager');
    }
    public function profileUpdate(Request $request,$id){
        // return $request->all();
        $user=User::findOrFail($id);
        $data=$request->all();
        $status=$user->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated your profile');
        }
        else{
            request()->session()->flash('error','Please try again!');
        }
        return redirect()->back();
    }

    public function settings(){
        $data=Settings::first();
        return view('backend.setting')->with('data',$data);
    }

    public function visito(){

        $hotposts=Post::getBlogByCategory('status','active')->orderBy('description-fr','DESC')->limit(10)->get();
        $videos = Video::orderBy('description-fr','DESC')->limit(4)->get();

        $clicks=Clicks::select('prop5',Clicks::raw('count(*) as total') )->groupBy('prop5')->get();


        return view('backend.visito')->with('clicks',$clicks)->with('hotposts',$hotposts)->with('videos',$videos);
    }



    public function postvisito($id){

        $hotposts=Post::getBlogByCategory('status','active')->orderBy('description-fr','DESC')->limit(10)->get();
        $videos = Video::orderBy('description-fr','DESC')->limit(4)->get();



        $clicks=Clicks::select('prop5',Clicks::raw('count(*) as total') )->groupBy('prop5')->where('ref_id',$id)->get();



        return view('backend.visito')->with('clicks',$clicks)->with('hotposts',$hotposts)->with('videos',$videos)->with('post_id',$id);
    }


    public function visito_s($name){

        $hotposts=Post::getBlogByCategory('status','active')->orderBy('description-fr','DESC')->limit(10)->get();
        $videos = Video::orderBy('description-fr','DESC')->limit(4)->get();


        $q=explode(',',$name);
if(count($q)>1){

   $q=explode(',',$name);

    $country=$q[0];
    $id=$q[1];
    $clicks=Clicks::where('prop5',$country)->where('ref_id',$id)->get();
}else{
   // return $name;
        $clicks=Clicks::where('prop5',$name)->get();

}






        return view('backend.visito')->with('clicks',$clicks)->with('sp','1')->with('hotposts',$hotposts)->with('videos',$videos)->with('art','1');
    }


    // public function post_visitors($id){
    //     $clicks=Clicks::where('ref_id',$id)->get();
    //     $hotposts=Post::getBlogByCategory('status','active')->orderBy('description-fr','DESC')->limit(10)->get();
    //     $videos = Video::orderBy('description-fr','DESC')->limit(4)->get();


    //     return view('backend.visito')->with('clicks',$clicks)->with('sp','1')->with('hotposts',$hotposts)->with('videos',$videos);
    // }










    public function settingsUpdate(Request $request){
        // return $request->all();
        $this->validate($request,[
            'short_des'=>'required|string',
            'description'=>'required|string',
            'photo'=>'required',
            'logo'=>'required',
            'address'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required|string',
        ]);
        $data=$request->all();
        // return $data;
        $settings=Settings::first();
        // return $settings;
        $status=$settings->fill($data)->save();
        if($status){
            request()->session()->flash('success','Setting successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again');
        }
        return redirect()->route('admin');
    }

    public function changePassword(){
        return view('backend.layouts.changePassword');
    }
    public function changPasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->route('admin')->with('success','Password successfully changed');
    }

    // Pie chart
    public function userPieChart(Request $request){
        // dd($request->all());
        $data = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();
     $array[] = ['Name', 'Number'];
     foreach($data as $key => $value)
     {
       $array[++$key] = [$value->day_name, $value->count];
     }
    //  return $data;
     return view('backend.index')->with('course', json_encode($array));
    }

    // public function activity(){
    //     return Activity::all();
    //     $activity= Activity::all();
    //     return view('backend.layouts.activity')->with('activities',$activity);
    // }
}
