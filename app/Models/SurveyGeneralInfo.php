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
        'arta_id',
        'respondent',
        'age',
        'sex',
        'pronoun',
        'office',
        'service',
        'religion',
        'point_of_entry',
        'educational_attainment',
        'date_of_visit',
        'frequently_visit',
        'cc1',
        'cc2',
        'cc3',
        'attachment',
        'name_of_respondent'
    ];

    // protected $casts = [
    //     'created_at' => 'datetime:m-d-Y',
    // ];

    public function surveyAnswers()
    {
        return $this->hasMany(SurveyAnswers::class, 'arta_id', 'arta_id');
    }

    public function surveyAbtStaffs()
    {
        return $this->hasMany(SurveyAbtStaff::class, 'arta_id', 'arta_id');
    }

    public function pssLocationDetail()
    {
        return $this->hasOne(PssLocation::class, 'wardcode', 'ward');
    }

    public function wardLocationDetail()
    {
        return $this->hasOne(Ward::class, 'wardcode', 'ward');
    }

    public function assistedBy()
    {
        return $this->hasOne(User::class, 'username', 'assisted_by');
    }
}
