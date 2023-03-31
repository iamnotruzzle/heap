<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyRespondents extends Model
{
    use HasFactory;

    protected $table = 'survey_respondents';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // declare primary as string
    // protected $keyType = 'string';

    protected $fillable = [
        'id',
        'hpercode',
    ];

    // protected $casts = [
    //     'created_at' => 'datetime:m-d-Y',
    // ];
}
