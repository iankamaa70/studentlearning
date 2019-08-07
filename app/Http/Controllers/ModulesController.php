<?php

namespace App\Http\Controllers;

use App\Modules;
use App\Videos;

use Illuminate\Http\Request;

class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules=Modules::paginate(6);
        return view('modules.index',compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules=Modules::all();
        return view("modules.create",compact('modules'));
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
            'name' => 'required|max:255',
            'pass_mark' => 'required|integer|min:1',
        ]);

        $pass_module_id;
        if((int)$request->pass_module_id==0){
            $pass_module_id=Null;
        }
        else{
            $pass_module_id=(int)$request->pass_module_id;
        }
        $module = Modules::create([
            'name'=>$request->name,
            'pass_mark'=>(int)$request->pass_mark,
            'pass_module_id'=>$pass_module_id
        ]);

        return redirect('/modules')->with('success', 'Module is successfully saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modules=Modules::find($id);
        $videos=Modules::find($id)->videos;
        return view('videos.index', compact('videos','modules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modules = Modules::findOrFail($id);
        $allmodules=Modules::all();

        return view('modules.edit', compact('modules','allmodules'));
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
        'name' => 'required|max:255',
        'pass_mark' => 'required|integer|min:1',
    ]);
    $pass_module_id;
    if((int)$request->pass_module_id==0){
        $pass_module_id=Null;
    }
    else{
        $pass_module_id=(int)$request->pass_module_id;
    }
        Modules::whereId($id)->update([
            'name'=>$request->name,
            'pass_mark'=>(int)$request->pass_mark,
            'pass_module_id'=>$pass_module_id
        ]   );

        return redirect('/modules')->with('success', 'Module name is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Modules::findOrFail($id);
        $module->delete();

        return redirect('/modules')->with('success', 'Module is successfully deleted');
    }
}
