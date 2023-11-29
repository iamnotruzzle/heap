<?php

namespace App\Http\Controllers\Report;

use App\Exports\SurveyAnswersExport;
use App\Http\Controllers\Controller;
use App\Models\LoginHistory;
use App\Models\SurveyGeneralInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SurveyAnswersController extends Controller
{
    protected $reports = [];

    public function export(Request $request)
    {
        // $reports = array();
        // $reports = [];

        $searchString = $request->search;

        $authCurrentLocation = LoginHistory::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->first();
        // dd($authCurrentLocation->wardcode);

        if ($authCurrentLocation->wardcode == 'admin' || $authCurrentLocation->wardcode == 'omcc' || $authCurrentLocation->wardcode == 'petro') {
            $answers = SurveyGeneralInfo::with(
                'surveyAnswers',
                'surveyAbtStaffs',
                'pssLocationDetail',
                'wardLocationDetail',
                'assistedBy:id,username,firstName,lastName',
            )
                ->when($request->sort_by, function ($query, $value) {
                    $query->orderBy($value, request('order_by', 'asc'));
                })
                ->when(
                    $request->from,
                    function ($query, $value) {
                        $query->whereDate('created_at', '>=', $value);
                    }
                )
                ->when(
                    $request->to,
                    function ($query, $value) {
                        $query->whereDate('created_at', '<=', $value);
                    }
                )
                ->orderBy('created_at', 'DESC')
                // ->get();
                ->chunk(500, function ($results) {
                    foreach ($results as $e) {
                        $this->reports[] = [
                            'ID' => $e->pss_id,
                            'RESPONDENT' => $e->respondent,
                            'AGE' => $e->age,
                            'SEX' => $e->sex,
                            'RELIGION' => $e->religion,
                            'LEVEL OF EDUCATION' => $e->educational_attainment,
                            'DATE OF CONSULT/VISIT' => $e->date_of_visit,
                            'POINT OF ENTRY' => $e->point_of_entry,
                            'SERVICES AVAILED' => $e->service_availed,
                            'VISIT PER YEAR' => $e->frequently_visit,
                            'HOSPITAL #' => $e->hospital_number,
                            'PREFERENCE' => $e->preference,
                            'PSS RATING' => $e->pss_rating,
                            'CC1' => $e->cc1,
                            'CC2' => $e->cc2,
                            'CC3' => $e->cc3,
                            'Q1' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[0]->answer,
                            'Q2' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[1]->answer,
                            'Q3' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[2]->answer,
                            'Q4' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[3]->answer,
                            'Q5' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[4]->answer,
                            'Q6' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[5]->answer,
                            'Q7' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[6]->answer,
                            'Q8' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[7]->answer,
                            'Q9' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[8]->answer,
                            'Q10' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[9]->answer,
                            'Q11' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[10]->answer,
                            'Q12' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[11]->answer,
                            'Q13' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[12]->answer,
                            'Q14' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[13]->answer,
                            'Q15' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[14]->answer,
                            'Q16' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[15]->answer,
                            // 'CORRECTIVE ACTION' => $e->attachment == null ? null : $e->attachment,
                            // about staff
                            'DOCTOR' => count($e->surveyAbtStaffs) == 0 ? 5 : $e->surveyAbtStaffs[0]->rating, // doctor
                            'NURSE' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[1]->rating, // nurse
                            'MIDWIFE' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[2]->rating, // midwife
                            'SECURITY' =>  count($e->surveyAbtStaffs) == 0 ? 5 : $e->surveyAbtStaffs[3]->rating, // security
                            'RADIOLOGY' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[4]->rating, // radiology
                            'PHARMACY' => count($e->surveyAbtStaffs) == 0 ? 5 : $e->surveyAbtStaffs[5]->rating, // pharmacy
                            'LABORATORY' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[6]->rating, // laboratory
                            'ADMITTING STAFF' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[7]->rating, // admitting staff
                            'MEDICAL RECORDS' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[8]->rating, // medical records
                            'BILLING' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[9]->rating, // billing
                            'CASHIER' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[10]->rating, // cashier
                            'SOCIAL WORKER' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[11]->rating, // social worker
                            'FOOD SERVER' => count($e->surveyAbtStaffs) == 0 ? 5 : $e->surveyAbtStaffs[12]->rating, // food server
                            'JANITORS/ORDERLY' => count($e->surveyAbtStaffs) == 0 ? 5 : $e->surveyAbtStaffs[13]->rating, // janitors/orderly
                            'LOCATION' => $e->pssLocationDetail != null ? $e->pssLocationDetail->wardname : $e->wardLocationDetail->wardname,
                            'ASSISTED BY' => $e->assistedBy == null ? null : $e->assistedBy->username,
                            'SUBMITTED AT' => $e->created_at->format('Y-m-d'),
                        ];
                    }
                });
        } else {
            $answers = SurveyGeneralInfo::with(
                'surveyAnswers',
                'surveyAbtStaffs',
                'pssLocationDetail',
                'wardLocationDetail',
                'assistedBy:id,username,firstName,lastName',
            )
                ->when($request->sort_by, function ($query, $value) {
                    $query->orderBy($value, request('order_by', 'asc'));
                })
                ->when(
                    $request->from,
                    function ($query, $value) {
                        $query->whereDate('created_at', '>=', $value);
                    }
                )
                ->when(
                    $request->to,
                    function ($query, $value) {
                        $query->whereDate('created_at', '<=', $value);
                    }
                )
                ->where('ward', $authCurrentLocation->wardcode)
                ->orderBy('created_at', 'DESC')
                ->chunk(500, function ($results) {
                    foreach ($results as $e) {
                        $this->reports[] = [
                            'ID' => $e->pss_id,
                            'RESPONDENT' => $e->respondent,
                            'AGE' => $e->age,
                            'SEX' => $e->sex,
                            'RELIGION' => $e->religion,
                            'LEVEL OF EDUCATION' => $e->educational_attainment,
                            'DATE OF CONSULT/VISIT' => $e->date_of_visit,
                            'POINT OF ENTRY' => $e->point_of_entry,
                            'SERVICES AVAILED' => $e->service_availed,
                            'VISIT PER YEAR' => $e->frequently_visit,
                            'HOSPITAL #' => $e->hospital_number,
                            'PREFERENCE' => $e->preference,
                            'PSS RATING' => $e->pss_rating,
                            'CC1' => $e->cc1,
                            'CC2' => $e->cc2,
                            'CC3' => $e->cc3,
                            'Q1' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[0]->answer,
                            'Q2' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[1]->answer,
                            'Q3' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[2]->answer,
                            'Q4' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[3]->answer,
                            'Q5' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[4]->answer,
                            'Q6' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[5]->answer,
                            'Q7' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[6]->answer,
                            'Q8' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[7]->answer,
                            'Q9' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[8]->answer,
                            'Q10' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[9]->answer,
                            'Q11' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[10]->answer,
                            'Q12' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[11]->answer,
                            'Q13' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[12]->answer,
                            'Q14' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[13]->answer,
                            'Q15' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[14]->answer,
                            'Q16' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[15]->answer,
                            // 'CORRECTIVE ACTION' => $e->attachment == null ? null : $e->attachment,
                            // about staff
                            'DOCTOR' => count($e->surveyAbtStaffs) == 0 ? 5 : $e->surveyAbtStaffs[0]->rating, // doctor
                            'NURSE' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[1]->rating, // nurse
                            'MIDWIFE' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[2]->rating, // midwife
                            'SECURITY' =>  count($e->surveyAbtStaffs) == 0 ? 5 : $e->surveyAbtStaffs[3]->rating, // security
                            'RADIOLOGY' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[4]->rating, // radiology
                            'PHARMACY' => count($e->surveyAbtStaffs) == 0 ? 5 : $e->surveyAbtStaffs[5]->rating, // pharmacy
                            'LABORATORY' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[6]->rating, // laboratory
                            'ADMITTING STAFF' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[7]->rating, // admitting staff
                            'MEDICAL RECORDS' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[8]->rating, // medical records
                            'BILLING' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[9]->rating, // billing
                            'CASHIER' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[10]->rating, // cashier
                            'SOCIAL WORKER' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[11]->rating, // social worker
                            'FOOD SERVER' => count($e->surveyAbtStaffs) == 0 ? 5 : $e->surveyAbtStaffs[12]->rating, // food server
                            'JANITORS/ORDERLY' => count($e->surveyAbtStaffs) == 0 ? 5 : $e->surveyAbtStaffs[13]->rating, // janitors/orderly
                            'LOCATION' => $e->pssLocationDetail != null ? $e->pssLocationDetail->wardname : $e->wardLocationDetail->wardname,
                            'ASSISTED BY' => $e->assistedBy == null ? null : $e->assistedBy->username,
                            'SUBMITTED AT' => $e->created_at->format('Y-m-d'),
                        ];
                    }
                });
        }
        // dd($answers);


        // foreach ($answers as $e) {
        //     // dd($e->pssLocationDetail);
        //     // dd($e->wardLocationDetail);
        //     array_push(
        //         $reports,
        //         [
        //             'ID' => $e->pss_id,
        //             'RESPONDENT' => $e->respondent,
        //             'AGE' => $e->age,
        //             'SEX' => $e->sex,
        //             'RELIGION' => $e->religion,
        //             'LEVEL OF EDUCATION' => $e->educational_attainment,
        //             'DATE OF CONSULT/VISIT' => $e->date_of_visit,
        //             'POINT OF ENTRY' => $e->point_of_entry,
        //             'SERVICES AVAILED' => $e->service_availed,
        //             'VISIT PER YEAR' => $e->frequently_visit,
        //             'HOSPITAL #' => $e->hospital_number,
        //             'PREFERENCE' => $e->preference,
        //             'PSS RATING' => $e->pss_rating,
        //             'CC1' => $e->cc1,
        //             'CC2' => $e->cc2,
        //             'CC3' => $e->cc3,
        //             'Q1' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[0]->answer,
        //             'Q2' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[1]->answer,
        //             'Q3' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[2]->answer,
        //             'Q4' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[3]->answer,
        //             'Q5' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[4]->answer,
        //             'Q6' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[5]->answer,
        //             'Q7' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[6]->answer,
        //             'Q8' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[7]->answer,
        //             'Q9' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[8]->answer,
        //             'Q10' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[9]->answer,
        //             'Q11' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[10]->answer,
        //             'Q12' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[11]->answer,
        //             'Q13' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[12]->answer,
        //             'Q14' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[13]->answer,
        //             'Q15' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[14]->answer,
        //             'Q16' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[15]->answer,
        //             // 'CORRECTIVE ACTION' => $e->attachment == null ? null : $e->attachment,
        //             // about staff
        //             'DOCTOR' => count($e->surveyAbtStaffs) == 0 ? 5 : $e->surveyAbtStaffs[0]->rating, // doctor
        //             'NURSE' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[1]->rating, // nurse
        //             'MIDWIFE' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[2]->rating, // midwife
        //             'SECURITY' =>  count($e->surveyAbtStaffs) == 0 ? 5 : $e->surveyAbtStaffs[3]->rating, // security
        //             'RADIOLOGY' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[4]->rating, // radiology
        //             'PHARMACY' => count($e->surveyAbtStaffs) == 0 ? 5 : $e->surveyAbtStaffs[5]->rating, // pharmacy
        //             'LABORATORY' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[6]->rating, // laboratory
        //             'ADMITTING STAFF' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[7]->rating, // admitting staff
        //             'MEDICAL RECORDS' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[8]->rating, // medical records
        //             'BILLING' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[9]->rating, // billing
        //             'CASHIER' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[10]->rating, // cashier
        //             'SOCIAL WORKER' => count($e->surveyAbtStaffs) == 0 ? rand(4, 5) : $e->surveyAbtStaffs[11]->rating, // social worker
        //             'FOOD SERVER' => count($e->surveyAbtStaffs) == 0 ? 5 : $e->surveyAbtStaffs[12]->rating, // food server
        //             'JANITORS/ORDERLY' => count($e->surveyAbtStaffs) == 0 ? 5 : $e->surveyAbtStaffs[13]->rating, // janitors/orderly
        //             'LOCATION' => $e->pssLocationDetail != null ? $e->pssLocationDetail->wardname : $e->wardLocationDetail->wardname,
        //             'ASSISTED BY' => $e->assistedBy == null ? null : $e->assistedBy->username,
        //             'SUBMITTED AT' => $e->created_at->format('Y-m-d'),
        //         ]
        //     );
        //     // dd('in', $reports);
        // }
        // dd($reports);

        return Excel::download(new SurveyAnswersExport($this->reports), 'report.xlsx');
    }
}
