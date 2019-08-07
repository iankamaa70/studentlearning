<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $fillable = ['question_text', 'answer_explanation', 'more_info_link'];
    public function answers(){
        return $this->hasMany(questionoptions::class);
    }
    public function options()
    {
        return $this->hasMany(questionoptions::class);
    }
}
