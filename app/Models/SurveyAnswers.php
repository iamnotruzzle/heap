<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyAnswers extends Model
{
    use HasFactory;

    protected $table = 'survey_answers';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // declare primary as string
    // protected $keyType = 'string';

    protected $fillable = [
        'id',
        'event_name',
        'survey_question_id',
        'answer',
        'remarks',
        'assisted_by',
    ];

    public function questions()
    {
        return $this->hasOne(SurveyQuestions::class, 'id', 'survey_question_id');
    }
}
