<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Msgmail;
use Mail;

class ContactController extends Controller
{
   
    
    public function storeContactForm(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required|digits:10|numeric',
        //     'subject' => 'required',
        //     'message' => 'required',
        // ]);
          
        $input = $request->all();

        

        //  Send mail to admin
        \Mail::send('sendmail', array(
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'subject' => "رسالة جديدة من مستخدم",
            'message' => $input['message'],
        ), function($message) use ($request){
            $message->from("abdooo.mostafa5@gmail.com");
            $message->to('4multijob@gmail.com', 'Admin')->subject($request->get('subject'));
        });

        return redirect()->back()->with(['success' => 'تم الارسال بنجاح']);
    }
}
