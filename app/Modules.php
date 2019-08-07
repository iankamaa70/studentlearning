<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    protected $fillable = ['name','pass_module_id','pass_mark'];

    public function videos(){
        return $this->hasMany(Videos::class);
    }
    public function questions($id){
        return $this->hasMany(Questions::class)->inRandomOrder()->limit($id)->get();
    }
    public function question(){
        return $this->hasMany(Questions::class)->inRandomOrder();
    }
}
