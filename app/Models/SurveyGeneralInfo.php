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
        'educational_attainment',
        'age',
        'sex',
        'religion',
        'date_of_visit',
        'department_visited',
        'visited_before',
    ];

    protected $casts = [
        'created_at' => 'datetime:m-d-Y',
    ];

    public function departmentsVisited()
    {
        return $this->hasMany(DepartmentsVisited::class, 'pss_id', 'pss_id');
    }

    public function surveyAnswers()
    {
        return $this->hasMany(SurveyAnswers::class, 'pss_id', 'pss_id');
    }

    public function surveyAbyStaffs()
    {
        return $this->hasMany(SurveyAbtStaff::class, 'pss_id', 'pss_id');
    }

    public function surveyOptAnswers()
    {
        return $this->hasMany(SurveyOptAnswers::class, 'pss_id', 'pss_id');
    }
}
