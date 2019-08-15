<?php

use Illuminate\Database\Seeder;
use App\Content;
class Webcontent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Content::create([
            'homepage_bold'=>"Learn Online",
            'homepage_text'=>"Learn and assess online.",
            'homepage_image'=>"",
        ]);;

    }
}
