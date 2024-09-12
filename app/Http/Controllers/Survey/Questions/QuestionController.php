<?php

namespace App\Http\Controllers\Survey\Questions;

use App\Http\Controllers\Controller;
use App\Models\SurveyAnswers;
use App\Models\SurveyQuestions;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class QuestionController extends Controller
{
    public function index()
    {
        $auth = Auth::user();

        $survey_questions = SurveyQuestions::all('id', 'desc');

        return Inertia::render(
            'Survey/Question/Index',
            [
                'auth' => $auth,
                'survey_questions' => $survey_questions,
            ]
        );
    }

    public function store(Request $request)
    {
        // dd($request);

        $user = Auth::user();

        //    'id',
        // 'event_name',
        // 'survey_question_id',
        // 'answer',
        // 'remarks',
        // 'assisted_by',

        $surveyAnswers = SurveyAnswers::insert(
            [
                [
                    'event_name' => $request->event_name,
                    'gender' => $request->gender,
                    'survey_question_id' => $request->q1['id'],
                    'answer' => (string)$request->q1['answer'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'event_name' => $request->event_name,
                    'gender' => $request->gender,
                    'survey_question_id' => $request->q2['id'],
                    'answer' => (string)$request->q2['answer'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]
        );

        return redirect()->back();
    }
}
