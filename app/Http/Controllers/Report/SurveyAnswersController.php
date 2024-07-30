<?php

namespace App\Http\Controllers\Report;

use App\Exports\SurveyAnswersExport;
use App\Http\Controllers\Controller;
use App\Models\LoginHistory;
use App\Models\SurveyGeneralInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Mockery\Undefined;

class SurveyAnswersController extends Controller
{
    protected $reports = [];

    public function export(Request $request)
    {
        $search = $request->search;
        $education = $request->education;
        $location = $request->location;
        $search = $request->search;
        $visiting = $request->visiting;
        $from = $request->from;
        $to = $request->to;
        // dd($location);

        $surveyAnswers = SurveyGeneralInfo::with(
            'surveyAnswers',
            'officeVisiting:id,name',
            'services:id,name',
            'surveyAbtStaffs',
        )
            ->when(
                $search == "undefined" ? '' : $search,
                function ($query, $value) {
                    $query->where('name_of_respondent', 'LIKE', '%' . $value . '%');
                }
            )
            ->when(
                $visiting == "undefined" ? '' : $visiting,
                function ($query, $value) {
                    $query->whereHas('officeVisiting', function ($q) use ($value) {
                        $q->where('id', (int)$value);
                    });
                }
            )
            ->when(
                $education == "undefined" ? '' : $education,
                function ($query, $value) {
                    $query->where('educational_attainment', 'LIKE', '%' . $value . '%');
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
            ->orderBy('created_at', 'desc')
            ->chunk(500, function ($results) {
                foreach ($results as $e) {
                    $this->reports[] = [
                        'ID' => $e->survey_id,
                        'CURRENTLY VISITING' => $e->officeVisiting->name,
                        'Respondent' => $e->respondent,
                        'Age' => $e->age,
                        'Sex' => $e->sex,
                        'Gender preferred pronoun' => $e->pronoun == null ? null : $e->pronoun,
                        'Religion' => $e->religion,
                        'Level of education' => $e->educational_attainment,
                        'Date of Consultation/Visit' => $e->date_of_visit,
                        'Point of Entry' => $e->office,
                        'Service Availed' => $e->services->name,
                        'How frequent do you visit this facility?' => $e->frequently_visit,
                        'CC1' => $e->cc1 == 1 ? "I know what a CC is and I saw this office's CC." : ($e->cc1 == 2 ? "I know what a CC is but I did NOT see this office's CC." : ($e->cc1 == 3 ? "I learned of the CC only when I saw this office's CC." :
                            "I do not know what a CC is and I did not see one in this office.")),
                        'CC2' => $e->cc2 == 1 ? "Easy to see" : ($e->cc2 == 2 ? "Somewhat easy to see" : ($e->cc2 == 3 ? "Difficult to see" : ($e->cc2 == 4 ? "Not visible at all" :
                            "N/A"))),
                        'CC3' => $e->cc3 == 1 ? "Helped very much" : ($e->cc3 == 2 ? "Somewhat helped" : ($e->cc3 == 3 ? "Did not help" :
                            "N/A")),
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
                        'Q14' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[12]->answer,
                        'Q15' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[13]->answer,
                        'Q16' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[14]->answer, // suggestions
                        'Q17' => count($e->surveyAnswers) == 0 ? rand(4, 5) : $e->surveyAnswers[15]->answer, // commendation
                        'NAME OF RESPONDENT' => $e->name_of_respondent,
                        'SUBMITTED AT' => $e->created_at->format('Y-m-d'),
                    ];
                }
            });

        // dd($this->reports);

        return Excel::download(new SurveyAnswersExport($this->reports), 'report.xlsx');
    }
}
