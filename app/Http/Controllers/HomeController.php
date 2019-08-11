<?php

namespace App\Http\Controllers;

use App\Modules;
use App\Videos;
use App\Tests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth'=>'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $modules=Modules::paginate(5,['*'],'module');
        return view('home_index',compact('modules'));
    }

    public function admin()
    { 
        return view('admin'); 
    }
    

    public function approval()
    {
    return view('approval');
    }   

    public function filter($id){
        $modules=Modules::paginate(5,['*'],'module');

        $searchmodule=Modules::find($id);
        $passmodule=Modules::find($searchmodule->pass_module_id);
       
        $passed=false;
        if($passmodule==null){
            $passed=true;
        }
        else{
            $tests=Tests::where('module_id',$passmodule->id)->get();
           foreach($tests as $test){
               if($test->pass==1){
                $passed=true;
               }
           }
        }
        $videos=Modules::findorfail($id)->videos()->paginate(1,['*'],'video');
        
        if($passed){
            return view('home',compact('modules','videos'));
        }
        else{
            return view('home_index',compact('modules'))->with('errormessage', 'You do not meet the requirements neccessary to access this module');
        }
    }



}
