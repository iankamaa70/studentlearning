<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test_answers extends Model
{
    protected $fillable = ['user_id', 'test_id', 'question_id', 'option_id', 'correct'];

    public function question()
    {
        return $this->belongsTo(Questions::class, 'question_id');
    }
}
