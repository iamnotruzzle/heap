<?php

namespace Database\Seeders;

use App\Models\SurveyOptQuestions;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey_opt_questions')->truncate();

        $survey_opt_questions = [
            [
                'desc' => 'Suggestions on how we can further improve our services? (Optional)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'If applicable, please the name of any remarkable hospital staff you would like to commend, as well as reason.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => "Patient's hospital number",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($survey_opt_questions as $soq) {
            SurveyOptQuestions::create($soq);
        }
    }
}
