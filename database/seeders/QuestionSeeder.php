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
                'desc' => 'The waiting areas we used were clean, orderly, and comfortable.',
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
                'desc' => 'Consultation process.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'Admission process.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'Laboratory and radiology processes.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'Discharge Process (Discharging, Billing, and Cashier).',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'Request of Documents from this Facility',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'Process of Request for Assistance from Medical Social Service.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'The medical condition and procedure were discussed clearly.',
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
                'desc' => 'The discharged instructions were discussed to us clearly before we were allowed to go home, including the time/date and site of the follow-up consultation.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'For those eligible for assistance from Malasakit Center. All my medical costs were covered for this particular medical treatment/admission.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'desc' => 'The information with regard to our medical treatment was kept confidential',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($survey_questions as $sq) {
            SurveyQuestions::create($sq);
        }
    }
}
