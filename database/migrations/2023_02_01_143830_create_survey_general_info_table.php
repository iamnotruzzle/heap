<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyGeneralInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sqlsrv2')->create('survey_general_info', function (Blueprint $table) {
            $table->id();
            $table->string('pss_id');
            $table->string('respondent');
            $table->string('educational_attainment');
            $table->integer('age');
            $table->string('sex');
            $table->string('religion');
            $table->date('date_of_visit');
            $table->string('department_visited');
            $table->string('visited_before');
            $table->string('ward');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('sqlsrv2')->dropIfExists('survey_general_info');
    }
}
