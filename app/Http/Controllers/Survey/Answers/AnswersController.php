<?php

namespace App\Http\Controllers\Survey\Answers;

use App\Http\Controllers\Controller;
use App\Models\SurveyGeneralInfo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchString = $request->search;

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
            ->orderBy('created_at', 'desc')
            ->paginate($request->page_size ?? 15);

        // dd($surveyAnswers);

        return Inertia::render(
            'SurveyAnswers/Index',
            [
                'surveyAnswers' => $surveyAnswers,
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
