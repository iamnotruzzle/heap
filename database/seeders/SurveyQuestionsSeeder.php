<?php

namespace Database\Seeders;

use App\Models\SurveyQuestions;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey_questions')->truncate();

        $survey__questions = [
            [
                'desc' => 'Gaano ka nasiyahan sa pataluntunang iyong dinaluhan sa pangkalahatan?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'Nararamdaman mo ba ang iyong natutunan ay makabuluhan at nakatulong sa pang-araw araw mong buhay?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($survey__questions as $sq) {
            SurveyQuestions::create($sq);
        }
    }
}
