<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\Models\HospitalStaff;
use App\Models\KeyGenerator;
use App\Models\SurveyGeneralInfo;
use App\Models\SurveyOptQuestions;
use App\Models\SurveyQuestions;
use Carbon\Carbon;
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
        // dd($request);
        $request->validate([
            'respondent' => 'required',
            'age' => 'required|numeric',
            'sex' => 'required',
            'religion' => 'required',
            'educationalAttainment' => 'required',
            'dateOfVisit' => 'required',
            'department' => 'required',
            'visited_before' => 'required',
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

        // Generate key
        $key = KeyGenerator::create([
            'generate' => 'y',
        ]);
        // get count of key generator where year is NOW
        $currentCodeCount = KeyGenerator::whereYear('created_at', Carbon::now()->year)->count();
        // PSS = Patient satisfaction survey
        $pss_id = 'PSS' . Carbon::now()->format('y') . '-' . sprintf('%06d', $currentCodeCount);

        // assign value of respondent based on the condition
        $respondent = '';
        if ($request->respondent == '' || $request->respondent == null) {
            $respondent = $request->otherRespondent;
        } else {
            $respondent = $request->respondent;
        };

        // assign value of religion based on the condition
        $religion = '';
        if ($request->religion == '' || $request->religion == null) {
            $religion = $request->otherReligion;
        } else {
            $religion = $request->religion;
        };

        // assign value of departmentVisited based on the condition
        $departmentVisited = '';
        if ($request->department == '' || $request->department == null) {
            $departmentVisited = $request->otherDepartment;
        } else {
            $departmentVisited = $request->department;
        };

        $surveyGeneralInfo = SurveyGeneralInfo::create([
            'pss_id' => $pss_id,
            'respondent' => $respondent,
            'educational_attainment' => $request->educationalAttainment,
            'age' => $request->age,
            'sex' => $request->sex,
            'religion' => $religion,
            'date_of_visit' => $request->dateOfVisit,
            'department_visited' => $departmentVisited,
            'visited_before' => $request->visited_before,
        ]);

        return redirect()->back();
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
