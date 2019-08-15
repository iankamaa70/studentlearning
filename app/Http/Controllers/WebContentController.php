<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use File;

class WebContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content=Content::first();
       
        return view('webcontent',compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $request->validate([
            'homepage_bold'=>'required',
            'homepage_text'=>'required',
            'homepage_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                          ]);

        $content=Content::find($id);

        if($request->hasfile('homepage_image')){
            $usersImage = public_path($content->homepage_image);
        if (File::exists($usersImage)) { 
            unlink($usersImage);
        }
            $file=$request->homepage_image;
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);  
            $data = $name;
            $path= '/images/'. $name;
            $content->homepage_image=$path;

        }

        $content->homepage_bold=$request->homepage_bold;
        $content->homepage_text=$request->homepage_text;

        $content->update();
       return redirect()->route('admin.webcontent')->with('success','Information saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
