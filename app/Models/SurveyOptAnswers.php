<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyOptAnswers extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'survey_opt_answers';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // declare primary as string
    // protected $keyType = 'string';

    protected $fillable = [
        'id',
        'pss_id',
        'survey_question_id',
        'comment',
    ];

    protected $casts = [
        'created_at' => 'datetime:m-d-Y',
    ];
}
