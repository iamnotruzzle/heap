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
            ->where('pss_id', 'LIKE', '%' . $searchString . '%')
            ->orWhereHas('surveyOptAnswers', function ($q) use ($searchString) {
                $q->where('comment', 'LIKE', '%' . $searchString . '%');
            })
            ->paginate(20);

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
