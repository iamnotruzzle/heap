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
        // dd($request->q1['rating']);
        $request->validate([
            'respondent' => 'required',
            'age' => 'required|numeric',
            'sex' => 'required',
            'religion' => 'required',
            'educationalAttainment' => 'required',
            'dateOfVisit' => 'required',
            'department' => 'required',
            'q1.rating' => 'required',
            'q2.rating' => 'required',
            'q3.rating' => 'required',
            'q10.rating' => 'required',
            'q11.rating' => 'required',
            'q12.rating' => 'required',
            'q13.rating' => 'required',
            'q14.rating' => 'required',
            'doctor.rating' => 'required',
            'nurse.rating' => 'required',
            'midwife.rating' => 'required',
            'security.rating' => 'required',
            'radiology.rating' => 'required',
            'pharmacy.rating' => 'required',
            'laboratory.rating' => 'required',
            'admitting_staff.rating' => 'required',
            'medical_records.rating' => 'required',
            'billing.rating' => 'required',
            'cashier.rating' => 'required',
            'social_worker.rating' => 'required',
            'food_server.rating' => 'required',
            'janitors_orderly.rating' => 'required',
            'q15.rating' => 'required',
        ]);
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
