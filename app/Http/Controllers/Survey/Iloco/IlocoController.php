<?php

namespace App\Http\Controllers\Survey\Iloco;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\HospitalStaff;
use App\Models\KeyGenerator;
use App\Models\PatientAccount;
use App\Models\SurveyAbtStaff;
use App\Models\SurveyAnswers;
use App\Models\SurveyGeneralInfo;
use App\Models\SurveyOptAnswers;
use App\Models\SurveyOptQuestions;
use App\Models\SurveyQuestions;
use App\Models\SurveyRespondents;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class IlocoController extends Controller
{
    public function index()
    {
        $hospital_staffs = HospitalStaff::all('id', 'type');

        $survey_questions = SurveyQuestions::all('id', 'desc');

        $survey_opt_questions = SurveyOptQuestions::all('id', 'desc');

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
            'Survey/Iloco/Index',
            [
                'hospital_staffs' => $hospital_staffs,
                'survey_questions' => $survey_questions,
                'survey_opt_questions' => $survey_opt_questions,
                'er_inpatient' => $er_inpatient,
                'outpatient_depts' => $outpatient_depts,
                'other_depts' => $other_depts,
            ]
        );
    }

    public function store(Request $request)
    {
        $pat_acct = PatientAccount::where('paacctno', $request->opt_q_3['comment'])->first();

        $record_exist = SurveyRespondents::where('paacctno', $request->opt_q_3['comment'])
            ->whereDate('created_at', Carbon::now())
            ->first();
        // dd($record_exist);

        if ($pat_acct == null) {
            return Redirect::back()->withErrors(['Hospital number not found.']);
        } else {
            if ($record_exist != null) {
                return Redirect::back()->withErrors(["Patient's hospital number is already recorded today."]);
            } else {
                $request->validate([
                    'respondent' => "required_if:otherRespondent,null",
                    'otherRespondent' => "required_if:respondent,null",
                    'age' => 'required|numeric|max:120',
                    'sex' => 'required',
                    'religion' => 'required',
                    'educationalAttainment' => 'required',
                    'dateOfVisit' => 'required',
                    'departments' => 'required',
                    'visited_before' => 'required',
                    'q1.rating' => 'required',
                    'q2.rating' => 'required',
                    'q3.rating' => 'required',
                    'q4.rating' => 'required',
                    'q5.rating' => 'required',
                    'q6.rating' => 'required',
                    'q7.rating' => 'required',
                    'q8.rating' => 'required',
                    'q9.rating' => 'required',
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
                    'q16.rating' => 'required',
                    'opt_q_4.comment' => 'required',
                    'opt_q_4.why' => 'required',
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

                $surveyGeneralInfo = SurveyGeneralInfo::create([
                    'pss_id' => $pss_id,
                    'respondent' => $respondent,
                    // 'respondent' => $request->respondent,
                    'educational_attainment' => $request->educationalAttainment,
                    'age' => $request->age,
                    'sex' => $request->sex,
                    'religion' => $request->religion,
                    'date_of_visit' => $request->dateOfVisit,
                    'department_visited' => implode("', '", $request->departments),
                    // 'department_visited' => $request->department,
                    'visited_before' => $request->visited_before,
                ]);

                $surveyAnswers = SurveyAnswers::insert(
                    [
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q1['id'],
                            'rating' => $request->q1['rating'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q2['id'],
                            'rating' => $request->q2['rating'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q3['id'],
                            'rating' => $request->q3['rating'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q4['id'],
                            'rating' => $request->q4['rating'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q5['id'],
                            'rating' => $request->q5['rating'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q6['id'],
                            'rating' => $request->q6['rating'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q7['id'],
                            'rating' => $request->q7['rating'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q8['id'],
                            'rating' => $request->q8['rating'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q9['id'],
                            'rating' => $request->q9['rating'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q10['id'],
                            'rating' => $request->q10['rating'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q11['id'],
                            'rating' => $request->q11['rating'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q12['id'],
                            'rating' => $request->q12['rating'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q13['id'],
                            'rating' => $request->q13['rating'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q14['id'],
                            'rating' => $request->q14['rating'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q15['id'],
                            'rating' => $request->q15['rating'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                        [
                            'pss_id' => $pss_id,
                            'survey_question_id' => $request->q16['id'],
                            'rating' => $request->q16['rating'],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ],
                    ]
                );

                $doctor_comment = null;
                if (isset($request->doctor['comment']) == false) {
                    $doctor_comment = null;
                } else {
                    $doctor_comment = $request->doctor['comment'];
                }

                $nurse_comment = null;
                if (isset($request->nurse['comment']) == false) {
                    $nurse_comment = null;
                } else {
                    $nurse_comment = $request->nurse['comment'];
                }

                $midwife_comment = null;
                if (isset($request->midwife['comment']) == false) {
                    $midwife_comment = null;
                } else {
                    $midwife_comment = $request->midwife['comment'];
                }

                $security_comment = null;
                if (isset($request->security['comment']) == false) {
                    $security_comment = null;
                } else {
                    $security_comment = $request->security['comment'];
                }

                $radiology_comment = null;
                if (isset($request->radiology['comment']) == false) {
                    $radiology_comment = null;
                } else {
                    $radiology_comment = $request->radiology['comment'];
                }

                $pharmacy_comment = null;
                if (isset($request->pharmacy['comment']) == false) {
                    $pharmacy_comment = null;
                } else {
                    $pharmacy_comment = $request->pharmacy['comment'];
                }

                $laboratory_comment = null;
                if (isset($request->laboratory['comment']) == false) {
                    $laboratory_comment = null;
                } else {
                    $laboratory_comment = $request->laboratory['comment'];
                }

                $admitting_staff_comment = null;
                if (isset($request->admitting_staff['comment']) == false) {
                    $admitting_staff_comment = null;
                } else {
                    $admitting_staff_comment = $request->admitting_staff['comment'];
                }

                $medical_records_comment = null;
                if (isset($request->medical_records['comment']) == false) {
                    $medical_records_comment = null;
                } else {
                    $medical_records_comment = $request->medical_records['comment'];
                }

                $billing_comment = null;
                if (isset($request->billing['comment']) == false) {
                    $billing_comment = null;
                } else {
                    $billing_comment = $request->billing['comment'];
                }

                $cashier_comment = null;
                if (isset($request->cashier['comment']) == false) {
                    $cashier_comment = null;
                } else {
                    $cashier_comment = $request->cashier['comment'];
                }

                $social_worker_comment = null;
                if (isset($request->social_worker['comment']) == false) {
                    $social_worker_comment = null;
                } else {
                    $social_worker_comment = $request->social_worker['comment'];
                }

                $food_server_comment = null;
                if (isset($request->food_server['comment']) == false) {
                    $food_server_comment = null;
                } else {
                    $food_server_comment = $request->food_server['comment'];
                }

                $janitors_orderly_comment = null;
                if (isset($request->janitors_orderly['comment']) == false) {
                    $janitors_orderly_comment = null;
                } else {
                    $janitors_orderly_comment = $request->janitors_orderly['comment'];
                }

                $surveyAbtStaff = SurveyAbtStaff::insert([
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->doctor['id'],
                        'rating' => $request->doctor['rating'],
                        'comment' => $doctor_comment,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->nurse['id'],
                        'rating' => $request->nurse['rating'],
                        'comment' => $nurse_comment,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->midwife['id'],
                        'rating' => $request->midwife['rating'],
                        'comment' => $midwife_comment,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->security['id'],
                        'rating' => $request->security['rating'],
                        'comment' => $security_comment,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->radiology['id'],
                        'rating' => $request->radiology['rating'],
                        'comment' => $radiology_comment,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->pharmacy['id'],
                        'rating' => $request->pharmacy['rating'],
                        'comment' => $pharmacy_comment,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->laboratory['id'],
                        'rating' => $request->laboratory['rating'],
                        'comment' => $laboratory_comment,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->admitting_staff['id'],
                        'rating' => $request->admitting_staff['rating'],
                        'comment' => $admitting_staff_comment,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->medical_records['id'],
                        'rating' => $request->medical_records['rating'],
                        'comment' => $medical_records_comment,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->billing['id'],
                        'rating' => $request->billing['rating'],
                        'comment' => $billing_comment,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->cashier['id'],
                        'rating' => $request->cashier['rating'],
                        'comment' => $cashier_comment,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->social_worker['id'],
                        'rating' => $request->social_worker['rating'],
                        'comment' => $social_worker_comment,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->food_server['id'],
                        'rating' => $request->food_server['rating'],
                        'comment' => $food_server_comment,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'staff_type' => $request->janitors_orderly['id'],
                        'rating' => $request->janitors_orderly['rating'],
                        'comment' => $janitors_orderly_comment,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                ]);

                $opt_q_1_comment = null;
                if (isset($request->opt_q_1['comment']) == false) {
                    $opt_q_1_comment = null;
                } else {
                    $opt_q_1_comment = $request->opt_q_1['comment'];
                }

                $opt_q_2_comment = null;
                if (isset($request->opt_q_2['comment']) == false) {
                    $opt_q_2_comment = null;
                } else {
                    $opt_q_2_comment = $request->opt_q_2['comment'];
                }

                $opt_q_3_comment = null;
                if (isset($request->opt_q_3['comment']) == false) {
                    $opt_q_3_comment = null;
                } else {
                    $opt_q_3_comment = $request->opt_q_3['comment'];
                }

                $opt_q_4_comment = [$request->opt_q_4['comment'], $request->opt_q_4['why']];
                $surveyOptAnswers = SurveyOptAnswers::insert([
                    [
                        'pss_id' => $pss_id,
                        'survey_question_id' => $request->opt_q_1['survey_question_id'],
                        'comment' => $opt_q_1_comment,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'survey_question_id' => $request->opt_q_2['survey_question_id'],
                        'comment' => $opt_q_2_comment,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'survey_question_id' => $request->opt_q_3['survey_question_id'],
                        'comment' => $opt_q_3_comment,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                    [
                        'pss_id' => $pss_id,
                        'survey_question_id' => $request->opt_q_3['survey_question_id'],
                        'comment' => implode("', '", $opt_q_4_comment),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                ]);

                $survey_respondents = SurveyRespondents::insert([
                    [
                        'paacctno' => $request->opt_q_3['comment'],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                ]);

                return redirect()->back();
            }
        }

        // return redirect()->back();
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
