<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Videos;
use App\Modules;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $videos = Videos::all();
        //return view('videos.index', compact('videos'));
        $modules=Modules::all();
        $videos=Videos::paginate(7);
        return view('videos.index',compact('modules','videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules=Modules::all();
        return view('videos.create',compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:30',
            'modules_id'=>'required',
            'description' => 'required',
            'video' => 'required|mimes:mp4,mov,ogg,qt,ts',
        ]);

        $videofile = $request->file('video');
       $videoName = time().'.'.request()->video->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/videos');
        $videoPath = '/uploads/videos/'.$videoName;
        $videofile->move($destinationPath, $videoName);
        $video=new Videos();
        $video->title=$request->title;
        $video->description=$request->description;
        $video->modules_id=$request->modules_id;
        $video->video=$videoPath;
        $video->save();
       
   
        return redirect('/videos')->with('success', 'Video has successfully been added to collection');
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
    public function filter(Request $request)
    {
        $videos=Videos::all();
        return view('videos.index', compact('videos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $videos = Videos::findOrFail($id);
        $modules= Modules::all();

    return view('videos.edit', compact('videos','modules'));
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
        $validatedData = $request->validate([
            'title' => 'required|max:30',
            'description' => 'required',
            'modules_id'=> 'required',
            'video' => 'mimes:mp4,mov,ogg,qt',
        ]);


        $data=Videos::find($id);

        if ($request->hasFile('video'))
        {
            $videofile = $request->file('video');
            $videoName = time().'.'.request()->video->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/videos');
            $videoPath = '/uploads/videos/'.$videoName;
            $videofile->move($destinationPath, $videoName);
            $data->video = $videoPath;                  
        }   

        $data->title=$request->title;
        $data->modules_id=$request->modules_id;
        $data->description=$request->description;
        $data->save(); 

        return redirect('/videos')->with('success', 'The record was successfully updated');


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $videos = Videos::findOrFail($id);
        $videos->delete();

        return redirect('/videos')->with('success', 'Record is successfully deleted');
    }
}
