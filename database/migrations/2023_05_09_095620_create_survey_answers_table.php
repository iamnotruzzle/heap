<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('survey_answers', function (Blueprint $table) {
            $table->id();
            $table->string('event_name')->nullable();
            $table->bigInteger('survey_question_id');
            $table->integer('answer');
            $table->string('remarks', 700)->nullable();
            $table->bigInteger('assisted_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('survey_answers');
    }
}
