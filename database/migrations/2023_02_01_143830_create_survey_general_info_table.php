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
            $table->string('pss_id')->nullable();
            $table->string('respondent')->nullable();
            $table->integer('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('religion')->nullable();
            $table->string('educational_attainment')->nullable();
            $table->date('date_of_visit')->nullable();
            $table->bigInteger('office');
            $table->string('service_availed')->nullable();
            $table->string('frequently_visit')->nullable();
            $table->string('cc1')->nullable();
            $table->string('cc2')->nullable();
            $table->string('cc3')->nullable();
            $table->string('hospital_number')->nullable();
            $table->string('preference')->nullable();
            $table->string('pss_rating')->nullable();
            $table->string('ward')->nullable();
            $table->string('assisted_by')->nullable();
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
