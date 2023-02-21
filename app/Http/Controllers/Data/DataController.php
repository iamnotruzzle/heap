<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\SurveyGeneralInfo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SurveyGeneralInfo::with(
            'departmentsVisited',
            'departmentsVisited.departments',
            'surveyAnswers',
            'surveyAbtStaffs',
            'surveyOptAnswers',
        )
            ->paginate(20);

        // dd($data);

        return Inertia::render(
            'Data/Index',
            [
                'data' => $data,
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
