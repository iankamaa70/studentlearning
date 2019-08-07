<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    protected $fillable = ['user_id', 'result','module_id','pass','total'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
