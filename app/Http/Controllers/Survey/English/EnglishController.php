<?php

namespace App\Http\Controllers\Survey\English;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\HospitalNumber;
use App\Models\HospitalStaff;
use App\Models\KeyGenerator;
use App\Models\SurveyAbtStaff;
use App\Models\SurveyAnswers;
use App\Models\SurveyEnglishQuestions;
use App\Models\SurveyGeneralInfo;
use App\Models\SurveyRespondents;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class EnglishController extends Controller
{
    public function index()
    {
        $hospital_staffs = HospitalStaff::all('id', 'type');

        $survey_questions = SurveyEnglishQuestions::all('id', 'desc');

        // $survey_opt_questions = SurveyOptQuestions::all('id', 'desc');

        // er and inpatient/wards
        $er_inpatient = Department::orderBy('name')
            ->where('id', 12)
            ->orWhere('id', 13)
            ->get(['id', 'name']);

        $outpatient_depts = Department::orderBy('name')
            ->where('id', '!=', 12)
            ->where('id', '!=', 13)
            ->where('id', '!=', 14)
            ->where('id', '!=', 15)
            ->where('id', '!=', 16)
            ->where('id', '!=', 17)
            ->where('id', '!=', 18)
            ->where('id', '!=', 19)
            ->get(['id', 'name']);

        // other depts
        $other_depts = Department::orderBy('name')
            ->where('id', '!=', 1)
            ->where('id', '!=', 2)
            ->where('id', '!=', 3)
            ->where('id', '!=', 4)
            ->where('id', '!=', 5)
            ->where('id', '!=', 6)
            ->where('id', '!=', 7)
            ->where('id', '!=', 8)
            ->where('id', '!=', 9)
            ->where('id', '!=', 10)
            ->where('id', '!=', 11)
            ->where('id', '!=', 12)
            ->where('id', '!=', 13)
            ->get(['id', 'name']);

        return Inertia::render(
            'Survey/English/Index',
            [
                'hospital_staffs' => $hospital_staffs,
                'survey_questions' => $survey_questions,
                // 'survey_opt_questions' => $survey_opt_questions,
                'er_inpatient' => $er_inpatient,
                'outpatient_depts' => $outpatient_depts,
                'other_depts' => $other_depts,
            ]
        );
    }

    public function store(Request $request)
    {
        $servicesAvailed = $request->serviceAvailed;
        $convertedArrToStr = '';
        // array_push($servicesAvailed, $request->otherServiceAvailed);

        // dd($servicesAvailed);


        if ($request->otherServiceAvailed != '' || $request->otherServiceAvailed != null) {
            // $serviceAvailed = implode(", ", $request->serviceAvailed);
            array_push($servicesAvailed, $request->otherServiceAvailed);
        }

        // convert array to string when inserting in database
        $convertedArrToStr = implode(", ", $servicesAvailed);

        $authUsername = Auth::user()->username;

        // get hospital number
        $hospital_number = HospitalNumber::where('hpercode', $request->q17['answer'])
            // ->where('encstat', 'a')
            ->first();

        // check if record already exist today with the
        // hospital number recorded
        $record_exist = SurveyRespondents::where('hpercode', $request->q17['answer'])
            ->whereDate('created_at', Carbon::now())
            ->first();

        if ($hospital_number == null) {
            return Redirect::back()->withErrors(['Hospital number not found.']);
        } else {
            if ($record_exist != null) {
                return Redirect::back()->withErrors(["Patient's hospital number is already recorded today."]);
            } else {
                $request->validate([
                    'respondent' => "required",
                    'pointOfEntry' => "required",
                    'age' => 'required|numeric|max:120',
                    'sex' => 'required',
                    'religion' => 'required',
                    'educationalAttainment' => 'required',
                    'dateOfVisit' => 'required',
                    'serviceAvailed' => 'required',
                    'frequentlyVisit' => 'required',
                    'cc1' => 'required',
                    'cc2' => 'required',
                    'cc3' => 'required',
                    'q1.answer' => 'required',
                    'q2.answer' => 'required',
                    'q3.answer' => 'required',
                    'q4.answer' => 'required',
                    'q5.answer' => 'required',
                    'q6.answer' => 'required',
                    'q7.answer' => 'required',
                    'q8.answer' => 'required',
                    'q9.answer' => 'required',
                    'q10.answer' => 'required',
                    'q11.answer' => 'required',
                    'q12.answer' => 'required',
                    'q13.answer' => 'required',
                    'q14.answer' => 'required',
                    // 'q15.answer' => 'required',
                    // 'q16.answer' => 'required',
                    'q17.answer' => 'required',
                    'q18.answer' => 'required',
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
                ]);

                // Generate key
                $key = KeyGenerator::create([
                    'generate' => 'y',
                ]);
                // get count of key generator where year is NOW
                $currentCodeCount = KeyGenerator::whereYear('created_at', Carbon::now()->year)->count();
                // PSS = Patient satisfaction survey
                $pss_id = 'PSS' . Carbon::now()->format('y') . '-' . sprintf('%06d', $currentCodeCount);

                $surveyGeneralInfo = SurveyGeneralInfo::create([
                    'pss_id' => $pss_id,
                    'respondent' => $request->respondent,
                    'educational_attainment' => $request->educationalAttainment,
                    'age' => $request->age,
                    'sex' => $request->sex,
                    'religion' => $request->religion,
                    'date_of_visit' => $request->dateOfVisit,
                    'point_of_entry' => $request->pointOfEntry,
                    'service_availed' => $convertedArrToStr,
                    'frequently_visit' => $request->frequentlyVisit,
                    'cc1' => $request->cc1,
                    'cc2' => $request->cc2,
                    'cc3' => $request->cc3,
                    'ward' => $authUsername,
                ]);

                // reason why some $request is converted to string https://github.com/laravel/framework/issues/28923
                $surveyAnswers = SurveyAnswers::insert(
                    [
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q1['id'],
                            'answer' => (string)$request->q1['answer'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q2['id'],
                            'answer' => (string)$request->q2['answer'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q3['id'],
                            'answer' => (string)$request->q3['answer'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q4['id'],
                            'answer' => (string)$request->q4['answer'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q5['id'],
                            'answer' => (string)$request->q5['answer'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q6['id'],
                            'answer' => (string)$request->q6['answer'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q7['id'],
                            'answer' => (string)$request->q7['answer'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q8['id'],
                            'answer' => (string)$request->q8['answer'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q9['id'],
                            'answer' => (string)$request->q9['answer'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q10['id'],
                            'answer' => (string)$request->q10['answer'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q11['id'],
                            'answer' => (string)$request->q11['answer'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q12['id'],
                            'answer' => (string)$request->q12['answer'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q13['id'],
                            'answer' => (string)$request->q13['answer'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q14['id'],
                            'answer' => (string)$request->q14['answer'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q15['id'],
                            'answer' => $request->q15['answer'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q16['id'],
                            'answer' => $request->q16['answer'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q17['id'],
                            'answer' => (string)$request->q17['answer'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q18['id'],
                            'answer' => (string)$request->q18['answer'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                    ]
                );

                $surveyAbtStaff = SurveyAbtStaff::insert([
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->doctor['id'],
                        'rating' => $request->doctor['rating'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->nurse['id'],
                        'rating' => $request->nurse['rating'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->midwife['id'],
                        'rating' => $request->midwife['rating'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->security['id'],
                        'rating' => $request->security['rating'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->radiology['id'],
                        'rating' => $request->radiology['rating'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->pharmacy['id'],
                        'rating' => $request->pharmacy['rating'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->laboratory['id'],
                        'rating' => $request->laboratory['rating'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->admitting_staff['id'],
                        'rating' => $request->admitting_staff['rating'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->medical_records['id'],
                        'rating' => $request->medical_records['rating'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->billing['id'],
                        'rating' => $request->billing['rating'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->cashier['id'],
                        'rating' => $request->cashier['rating'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->social_worker['id'],
                        'rating' => $request->social_worker['rating'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->food_server['id'],
                        'rating' => $request->food_server['rating'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->janitors_orderly['id'],
                        'rating' => $request->janitors_orderly['rating'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                ]);

                $survey_respondents = SurveyRespondents::insert([
                    [
                        'hpercode' => $request->q17['answer'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                ]);

                return redirect()->back();
            }
        }

        // return redirect()->back();
    }
}
