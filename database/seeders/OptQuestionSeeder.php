<?php

namespace Database\Seeders;

use App\Models\SurveyOptQuestions;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OptQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $survey_opt_questions = [
            [
                'desc' => 'Aside from above mentioned, do you have anything else you would like to share about your experience with this hospital?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'Are there any remarkable hospital staff you would like to commend? If yes, please write their name in the space provided below, as well as your reason.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => "Patient's hospital number",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => "Which form of survey do you prefer?",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($survey_opt_questions as $soq) {
            SurveyOptQuestions::create($soq);
        }
    }
}
