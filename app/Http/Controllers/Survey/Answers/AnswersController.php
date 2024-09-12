<?php

namespace App\Http\Controllers\Survey\Answers;

use App\Http\Controllers\Controller;
use App\Models\SurveyAnswers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class AnswersController extends Controller
{
    public function index(Request $request)
    {
        // $searchString = $request->search;

        // // Get user roles
        // $authRole = Auth::user()->getRoleNames();
        // // dd($authRole[0]);

        $surveyAnswers = SurveyAnswers::with('questions')
            ->when($request->search, function ($query, $value) {
                $query->where(function ($query) use ($value) {
                    $query->where('event_name', 'LIKE', '%' . $value . '%')
                        ->orWhereHas('questions', function ($query) use ($value) {
                            $query->where('desc', 'LIKE', '%' . $value . '%');
                        });
                });
            })
            ->when($request->from, function ($query, $value) {
                $query->whereDate('created_at', '>=', $value);
            })
            ->when($request->to, function ($query, $value) {
                $query->whereDate('created_at', '<=', $value);
            })
            ->when(
                $request->gender,
                function ($query, $value) {
                    $query->where('gender', 'LIKE', '%' . $value . '%');
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

    // public function store(Request $request)
    // {
    //     // dd($request->id);

    //     $attachment = '';
    //     $request->validate([
    //         'attachment' => 'nullable|mimes:jpeg,jpg,png,gif,svg|max:20000',
    //     ]);

    //     if ($request->hasFile('attachment')) {
    //         $attachment = $request->file('attachment')->store('attachment', 'public');
    //     } else {
    //         $attachment = null;
    //     }

    //     SurveyGeneralInfo::where('id', $request->id)
    //         ->update([
    //             'attachment' => $attachment,
    //         ]);

    //     return Redirect::route('answers.index');
    // }


    // public function update(Request $request, $id)
    // {
    //     // dd($request);

    //     $file = SurveyGeneralInfo::where('id', $id)->first();

    //     // dd($id);

    //     $attachment = '';
    //     $request->validate([
    //         'attachment' => 'nullable|mimes:doc,docx,pdf,jpeg,jpg,png,gif,svg|max:20000',
    //     ]);


    //     if ($request->hasFile('attachment')) {
    //         Storage::delete('public/' . $file->attachment);
    //         $attachment = $request->file('attachment')->store('attachment', 'public');
    //     }

    //     SurveyGeneralInfo::where('id', $id)
    //         ->update([
    //             'attachment' => $attachment,
    //         ]);

    //     return Redirect::route('answers.index');
    // }

    // public function destroy($id)
    // {
    //     // dd($id);

    //     DB::table('survey_respondents')->where('survey_id', $id)->delete();
    //     DB::table('survey_general_info')->where('survey_id', $id)->delete();
    //     DB::table('survey_answers')->where('survey_id', $id)->delete();
    //     DB::table('survey_abt_staff')->where('survey_id', $id)->delete();
    //     DB::table('delete_request')->where('survey_id', $id)->delete();

    //     // return Redirect::route('answers.index');

    //     return redirect()->back();
    // }
}
