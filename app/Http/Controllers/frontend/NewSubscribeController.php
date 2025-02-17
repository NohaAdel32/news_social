<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\NewSubscribe;
use Illuminate\Http\Request;
use session;

class NewSubscribeController extends Controller
{
    public function store(Request $request)
    {
        $data=$request->validate([
            'email'=>'required|string|unique:new_subscribes',
        ]);
         $new=  NewSubscribe::create($data);
         if(!$new){
            session::flash('error','sorry try again!');
            return redirect()->back();
         }
         session::flash('success','thanks for subscribe');
           return redirect()->back();
    }
}
