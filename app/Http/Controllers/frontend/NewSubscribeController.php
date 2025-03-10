<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\frontend\NewsubscriberMail;
use App\Models\NewSubscribe;
use Illuminate\Http\Request;
// use session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session; // Add this line


class NewSubscribeController extends Controller
{
    public function store(Request $request)
    {
        $data=$request->validate([
            'email'=>'required|string|unique:new_subscribes',
        ]);
         $new=  NewSubscribe::create($data);
         if(!$new){
            Session::flash('error','sorry try again!');
            return redirect()->back();
         }
         Mail::to($request->email)->send(new NewsubscriberMail());
         Session::flash('success','thanks for subscribe');
           return redirect()->back();
    }
}
