<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\LoginHistory;
use App\Models\SurveyGeneralInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyAnswersController extends Controller
{
    public function export(Request $request)
    {

        // dd($request);
        $searchString = $request->search;

        $authCurrentLocation = LoginHistory::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->first();
        // dd($authCurrentLocation->wardcode);

        if ($authCurrentLocation->wardcode == 'admin' || $authCurrentLocation->wardcode == 'omcc' || $authCurrentLocation->wardcode == 'petro') {
            $surveyAnswers = SurveyGeneralInfo::with(
                'surveyAnswers',
                'surveyAbtStaffs',
                'pssLocationDetail',
                'wardLocationDetail',
                'assistedBy:id,username,firstName,lastName',
            )
                ->when($request->sort_by, function ($query, $value) {
                    $query->orderBy($value, request('order_by', 'asc'));
                })
                // ->when(
                //     $request->sex,
                //     function ($query, $value) {
                //         $query->where('sex', $value);
                //     }
                // )
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
                ->when(
                    $request->employee_id,
                    function ($query, $value) {
                        $query->where('assisted_by', 'LIKE', '%' . $value . '%');
                    }
                )
                ->when(
                    $request->pss_id,
                    function ($query, $value) {
                        $query->where('pss_id', 'LIKE', '%' . $value . '%');
                    }
                )
                ->when(
                    $request->education,
                    function ($query, $value) {
                        $query->where('educational_attainment', 'LIKE', '%' . $value . '%');
                    }
                )
                ->when(
                    $request->search,
                    function ($query, $value) {
                        $query->where('hospital_number', 'LIKE', '%' . $value . '%');
                    }
                )
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $surveyAnswers = SurveyGeneralInfo::with(
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
                    $request->sex,
                    function ($query, $value) {
                        $query->where('sex', $value);
                    }
                )
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
                ->when(
                    $request->education,
                    function ($query, $value) {
                        $query->where('educational_attainment', 'LIKE', '%' . $value . '%');
                    }
                )
                ->when(
                    $request->search,
                    function ($query, $value) {
                        $query->where('hospital_number', 'LIKE', '%' . $value . '%');
                    }
                )
                ->where('ward', $authCurrentLocation->wardcode)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        dd($surveyAnswers);

        // return Excel::download(new SurveyAnswersExport($reports), 'report.xlsx');
    }
}
