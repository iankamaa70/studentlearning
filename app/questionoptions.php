<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questionoptions extends Model
{
    protected $fillable = ['questions_id','option','correct',];
}
