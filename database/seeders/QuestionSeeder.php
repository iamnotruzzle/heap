<?php

namespace Database\Seeders;

use App\Models\SurveyQuestions;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $survey_questions = [
            [
                'desc' => 'The waiting areas were clean, orderly, and comfortable.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'The toilets and bathrooms inside the facility were kept clean, orderly and with a steady water supply.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => "The patients' rooms were kept clean, tidy, and comfortable.",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'The steps (including payment) I needed to do for my transaction were easy and simple.(SQD3).',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'The office followed the transaction’s requirements and steps based on the information provided.(SQD2).',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'I easily found information about my transaction from the office or its website.(SQD4).',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'I spent a reasonable amount of time for my transaction.(SQD1).',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'The medical condition, procedures and instructions were discussed clearly.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'Our sentiments, cultural background, and beliefs were heard and considered in the treatment procedure.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'We were given the chance to decide which treatment procedure shall be performed.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'I got what I needed from the hospital, or (if denied) denial of request was sufficiently explained to me.(SQD8)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'I paid a reasonable amount of fees for my transaction.(SQD5)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($survey_questions as $sq) {
            SurveyQuestions::create($sq);
        }
    }
}
