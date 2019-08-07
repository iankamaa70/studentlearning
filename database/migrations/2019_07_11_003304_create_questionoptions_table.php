<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionoptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionoptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questions_id')->unsigned()->nullable();
            $table->foreign('questions_id', 'fk_257_question_question_id_questions_option')->references('id')->on('questions')->onDelete('cascade');
            $table->string('option')->nullable();
            $table->tinyInteger('correct')->nullable()->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionoptions');
    }
}
