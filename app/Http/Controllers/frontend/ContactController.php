<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\frontend\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('frontend.contact');
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
    public function store(ContactRequest $request)
    {
       $request->validated();
       $request->merge([
        'ip_adress'=>$request->ip(),
       ]);
      
       $contact=Contact::create($request->except('_token'));
       if(!$contact){
        Session::flash('error','Contact Failed');
        return redirect()->back();
       }
       Session::flash('success','Your MSg created successful ');
       return redirect()->back();
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
