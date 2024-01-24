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
                'RESPONDENT',
                'AGE',
                'SEX',
                'RELIGION',
                'LEVEL OF EDUCATION',
                'DATE OF CONSULT/VISIT',
                'POINT OF ENTRY',
                'SERVICES AVAILED',
                'VISIT PER YEAR',
                'HOSPITAL #',
                'PREFERENCE',
                'PSS RATING',
                'CC1',
                'CC2',
                'CC3',
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
                'DOCTOR',
                'NURSE',
                'MIDWIFE',
                'SECURITY',
                'RADIOLOGY',
                'PHARMACY',
                'LABORATORY',
                'ADMITTING STAFF',
                'MEDICAL RECORDS',
                'BILLING',
                'CASHIER',
                'SOCIAL WORKER',
                'FOOD SERVER',
                'JANITORS/ORDERLY',
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
