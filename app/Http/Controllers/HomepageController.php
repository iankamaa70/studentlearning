<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;

class HomepageController extends Controller
{
    public function index(){
        $content=Content::first();
        return view('welcome',compact('content'));
    }
}
