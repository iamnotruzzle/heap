<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\Models\HospitalStaff;
use App\Models\SurveyOptQuestions;
use App\Models\SurveyQuestions;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PssController extends Controller
{
    public function index()
    {
        $hospital_staffs = HospitalStaff::all('id', 'type');

        $survey_questions = SurveyQuestions::all('id', 'desc');

        $survey_opt_questions = SurveyOptQuestions::all('id', 'desc');

        return Inertia::render(
            'Survey/Pss/Index',
            [
                'hospital_staffs' => $hospital_staffs,
                'survey_questions' => $survey_questions,
                'survey_opt_questions' => $survey_opt_questions,
            ]
        );
    }

    public function store(Request $request)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
