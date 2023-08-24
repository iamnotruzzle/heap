<?php

namespace App\Http\Controllers\Survey\Answers;

use App\Http\Controllers\Controller;
use App\Models\DeleteRequest;
use App\Models\LoginHistory;
use App\Models\SurveyGeneralInfo;
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
                ->orderBy('created_at', 'desc')
                ->paginate($request->page_size ?? 15);
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
                ->paginate($request->page_size ?? 15);
        }

        $delete_requests = DeleteRequest::with('users')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return Inertia::render(
            'SurveyAnswers/Index',
            [
                'surveyAnswers' => $surveyAnswers,
                'delete_requests' => $delete_requests,
            ]
        );
    }

    public function store(Request $request)
    {
        // dd($request->id);

        $attachment = '';
        $request->validate([
            'attachment' => 'nullable|mimes:jpeg,jpg,png,gif,svg|max:20000',
        ]);

        if ($request->hasFile('attachment')) {
            $attachment = $request->file('attachment')->store('attachment', 'public');
        } else {
            $attachment = null;
        }

        SurveyGeneralInfo::where('id', $request->id)
            ->update([
                'attachment' => $attachment,
            ]);

        return Redirect::route('answers.index');
    }


    public function update(Request $request, $id)
    {
        // dd($request);

        $file = SurveyGeneralInfo::where('id', $id)->first();

        // dd($id);

        $attachment = '';
        $request->validate([
            'attachment' => 'nullable|mimes:doc,docx,pdf,jpeg,jpg,png,gif,svg|max:20000',
        ]);


        if ($request->hasFile('attachment')) {
            Storage::delete('public/' . $file->attachment);
            $attachment = $request->file('attachment')->store('attachment', 'public');
        }

        SurveyGeneralInfo::where('id', $id)
            ->update([
                'attachment' => $attachment,
            ]);

        return Redirect::route('answers.index');
    }

    public function destroy($id)
    {
        // dd($id);

        DB::table('survey_respondents')->where('pss_id', $id)->delete();
        DB::table('survey_general_info')->where('pss_id', $id)->delete();
        DB::table('survey_answers')->where('pss_id', $id)->delete();
        DB::table('survey_abt_staff')->where('pss_id', $id)->delete();
        DB::table('delete_request')->where('pss_id', $id)->delete();

        // return Redirect::route('answers.index');

        return redirect()->back();
    }
}
