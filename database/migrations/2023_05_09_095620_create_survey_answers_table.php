<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyAnswersTable extends Migration
{
    public function up()
    {
        Schema::connection('sqlsrv2')->create('survey_answers', function (Blueprint $table) {
            $table->id();
            $table->string('pss_id');
            $table->bigInteger('survey_question_id');
            $table->string('answer', 700)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::connection('sqlsrv2')->dropIfExists('survey_answers');
    }
}
