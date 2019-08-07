<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules;
use App\questionoptions;
use App\Test_answers;
use App\Tests;
use Auth;   


class TestsController extends Controller
{
    public function index($id){
        $module=Modules::find($id);
        $questions=Modules::find($id)->questions($module->pass_mark);
        foreach ($questions as &$question) {
            $question->options = questionoptions::where('questions_id', $question->id)->inRandomOrder()->get();
        }

        return view('tests.create', compact('questions','module'));
    }

    public function store(Request $request){
        $result = 0;
        $module=Modules::find($request->module_id);
        $test = Tests::create([
            'user_id' => Auth::id(),
            'result'  => $result,
            'module_id'=>$request->module_id,
            
        ]);
        foreach ($request->input('questions', []) as $key => $question) {
           var_dump($question);
            $status = 0;
if ($request->input('answers.'.$question) != null&& questionoptions::find($request->input('answers.'.$question))->correct
            ) {
                $status = 1;
                $result++;
            }
            Test_answers::create([
                'user_id'     => Auth::id(),
                'test_id'     => $test->id,
                'question_id' => $question,
                'option_id'   => $request->input('answers.'.$question),
                'correct'     => $status,
            ]);
        }
            
        $test->update(['result' => $result,'total'=>$module->pass_mark]);
        if($module->pass_mark==$result){
        $test->update(['pass' => 1]);
        }
       return redirect()->route('results.show', [$test->id]);
    }
}
