<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SurveyAnswersExport implements FromArray, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function headings(): array
    {
        return [
            [
                'ID',
                'Respondent',
                'Age',
                'Sex',
                'Gender preferred pronoun',
                'Religion',
                'Level of education',
                'Date of Consultation/Visit',
                'Point of Entry',
                'Services Availed',
                'How frequent do you visit this facility?',
                'HOSPITAL #',
                'Preference',
                'PSS RATING',
                'Which of the following best describes your awareness of a CC?', // cc1
                'If aware of CC (answered 1-3 in CC1), would you say that the CC of this office was …?', // cc2
                'If aware of CC (answered codes 1-3 in CC1), how much did the CC help you in your transaction?', // cc3
                'Q1',
                'Q2',
                'Q3',
                'Q4',
                'Q5',
                'Q6',
                'Q7',
                'Q8',
                'Q9',
                'Q10',
                'Q11',
                'Q12',
                // 'Q13',
                // 'Q14',
                // 'Q15',
                // 'Q16',
                'Doctor',
                'Nurse',
                'Midwife',
                'Security',
                'Radiology',
                'Pharmacy',
                'Laboratory',
                'Admitting staff',
                'Medical records',
                'Billing',
                'Cashier',
                'Social worker',
                'Food server',
                'Janitors/Orderly',
                'Q14',
                'Q15',
                'Q16',
                'Q17',
                'LOCATION',
                'ASSISTED BY',
                'SUBMITTED AT',
            ],
        ];
    }

    // for array
    public function array(): array
    {
        return collect($this->data)->toArray();
    }
}
