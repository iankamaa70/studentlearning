<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tests;
use App\Charts\TestsChart;
use App\Modules;
use DB;

class StudentTests extends Controller
{
    public function index(){
        $users=User::where('isAdmin','=',null)->where('isTeacher','=',null)->get();
        return view('studentprogress',compact('users'));
    }

    public function filter(Request $request){

        $users=User::where('isAdmin','=',null)->where('isTeacher','=',null)->get();
        $validated=$request->validate([
            'student_id'=>'required',
        ]);

        $studid=(int)$request->student_id;
        $user_selected=User::find($studid);
        $tests=Tests::where('user_id','=',$studid)->oldest()->get();
        $exams=collect([]);
        $percentages=collect([]);

           foreach ($tests as $test) {
               $module=Modules::find($test->module_id)->first();
              $exams->push($module->name);            
              $percentages->push((($test->result/$test->total)*100));
           }

        $chart = new TestsChart;
        $chart->labels($exams);
        $chart->dataset("Test Performance", 'line',$percentages);

        $stats=DB::table('tests')
        ->join('modules', 'modules.id', '=', 'tests.module_id')
        ->select('modules.name',DB::raw('count(*) as total'))
        ->where('user_id','=',$studid)
        ->groupBy('module_id')
        ->get();
        return view('studentprogress',compact('users','tests','chart','stats','user_selected'));
        
    }
}
