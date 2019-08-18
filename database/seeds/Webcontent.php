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
            'homepage_image'=>"images/tests.png",
            'web_logo'=>'images/tests.png',
            'web_name'=>'Student learning',
            'web_footer_text'=>'Student Learning is an online learning platform that helps anyone achieve their personal and professional goals.',
        ]);;

    }
}
