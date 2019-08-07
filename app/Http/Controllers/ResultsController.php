<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tests;
use App\Modules;
use App\Test_answers;
use Auth;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Tests::all()->load('user');

        if (auth()->user()->isAdmin!=1) {
            $results = $results->where('user_id', '=', Auth::id());
            
        }
        $modules=Modules::all();

        return view('results.index', compact('results','modules'));
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
        $test = Tests::find($id)->load('user');
       
        
        if ($test) {
            $results = Test_answers::where('test_id', $id)
                ->with('question')
                ->with('question.options')
                ->get()
            ;
            $module=Modules::find($test->module_id);
        }

        return view('results.show', compact('test', 'results','module'));
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
        //
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
