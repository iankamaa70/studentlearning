<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['homepage_bold','homepage_text','homepage_image','web_logo','web_name','web_footer_text'];
}
