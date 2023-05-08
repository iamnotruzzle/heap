<?php

namespace App\Http\Controllers\Survey\Answers;

use App\Http\Controllers\Controller;
use App\Models\DeleteRequest;
use App\Models\Department;
use App\Models\SurveyGeneralInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AnswersController extends Controller
{
    public function index(Request $request)
    {
        $searchString = $request->search;
        $searchDepartment = $request->department;

        $departments = Department::orderBy('name')->get();

        $surveyAnswers = SurveyGeneralInfo::with(
            'departmentsVisited',
            'departmentsVisited.departments',
            'surveyAnswers',
            'surveyAbtStaffs.hospitalStaffs',
            'surveyOptAnswers',
        )
            ->when($request->sort_by, function ($query, $value) {
                $query->orderBy($value, request('order_by', 'asc'));
            })
            ->when(
                $request->search,
                function ($query, $value) use ($request) {
                    $query->where('pss_id', 'LIKE', '%' . $value . '%')
                        ->orWhereHas(
                            'surveyOptAnswers',
                            function ($q) use ($request) {
                                $q->where('comment', 'LIKE', '%' . $request->search . '%');
                            }
                        );
                }
            )
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
            // ->WhereHas('departmentsVisited', function ($query) use ($request) {
            //     $query->when($request->department, function ($query) use ($request) {
            //         return $query->where('department_id', '=', $request->department);
            //     });
            // })
            ->when(
                $request->sex,
                function ($query, $value) {
                    $query->where('sex', $value);
                }
            )
            ->orderBy('created_at', 'desc')
            ->paginate($request->page_size ?? 15);

        $delete_requests = DeleteRequest::with('users')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return Inertia::render(
            'SurveyAnswers/Index',
            [
                'surveyAnswers' => $surveyAnswers,
                'departments' => $departments,
                'delete_requests' => $delete_requests,
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
        // dd($id);

        DB::table('survey_general_info')->where('pss_id', $id)->delete();
        DB::table('survey_answers')->where('pss_id', $id)->delete();
        DB::table('survey_abt_staff')->where('pss_id', $id)->delete();
        DB::table('survey_opt_answers')->where('pss_id', $id)->delete();
        DB::table('delete_request')->where('pss_id', $id)->delete();

        // return Redirect::route('answers.index');

        return redirect()->back();
    }
}
