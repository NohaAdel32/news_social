<?php

namespace App\Http\Controllers\frontend\dashboard;
use App\Models\User;
use App\Utils\ImageManager;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\frontend\SettingRequest;

class settingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=auth()->user();
        return view('frontend.dashboard.setting',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request)
    {
        $request->validated();
        $user=User::findOrFail(auth()->user()->id);
        $user->update($request->except(['_token','image']));
        if($request->hasFile('image')){
  ImageManager::updateImage($request,$user,'users');
        }
       
        return redirect()->back()->with('success','Profile Data Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
     public function changePassword(Request $request){
         $data= $request->validate([
           'currentPassword'=>['required'],
           'password'=>['required','confirmed'],
         
          ]);
        if(!Hash::check($data['currentPassword'],auth()->user()->password)){
            Session::flash('error','Password does not match!');
            return redirect()->back();
        }
        $user=User::findOrFail(auth()->user()->id);
        $user->update([
           'password'=>Hash::make($data['password']),
        ]);
        Session::flash('success','Password updates successfully!');
        return redirect()->back();
     }
}
