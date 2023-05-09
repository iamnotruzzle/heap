<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyGeneralInfo extends Model
{
    use HasFactory;

    protected $table = 'survey_general_info';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // declare primary as string
    // protected $keyType = 'string';

    protected $fillable = [
        'id',
        'pss_id',
        'respondent',
        'age',
        'sex',
        'religion',
        'educational_attainment',
        'date_of_visit',
        'point_of_entry',
        'service_availed',
        'frequently_visit',
        'cc1',
        'cc2',
        'cc3',
        'hospital_number',
        'ward'
    ];

    // protected $casts = [
    //     'created_at' => 'datetime:m-d-Y',
    // ];

    public function surveyAnswers()
    {
        return $this->hasMany(SurveyAnswers::class, 'pss_id', 'pss_id');
    }

    public function surveyAbtStaffs()
    {
        return $this->hasMany(SurveyAbtStaff::class, 'pss_id', 'pss_id');
    }
}
