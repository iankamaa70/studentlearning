<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules;
use App\Questions;
use App\questionoptions;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Questions::paginate(10);
        $modules=Modules::all();

        return view('questions.index',compact('questions','modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules=Modules::all();
        return view('questions.create',compact('modules'));
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
            'modules_id' => 'required',
            'question_text' => 'required',
            'more_info_link' => ['nullable', 'url'],
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'correct' => 'required',
        ]);
        $question=Questions::create($validatedData);
        $question->modules_id=(int)$request->modules_id;
        $question->save();
        $question;

        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                questionoptions::create([
                    'questions_id' => $question->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }

        return redirect('/questions')->with('success', 'Question is successfully created');
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
        $question=Questions::findOrFail($id);
        $modules=Modules::all();
    
        return view('questions.edit',compact('question','modules'));
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
            'modules_id' => 'required',
            'question_text' => 'required',
            'answer_explanation' => 'required',
            'more_info_link' => 'url',
        ]);
        $question=Questions::find($id);
        $question->modules_id=$request->modules_id ;
        $question->question_text=$request->question_text;
        $question->answer_explanation=$request->answer_explanation;
        $question->more_info_link=$request->more_info_link;
        $question->save();

        return redirect('/questions')->with('success', 'Question is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questions = Questions::findOrFail($id);
        $questions->delete();

        return redirect('/questions')->with('success', 'Question is successfully deleted');
    }
    public function filter($id){
        $questions=Modules::find($id)->question()->paginate(10);
        $modules=Modules::all();

        return view('questions.index',compact('questions','modules'));
    }
}
