<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyAbtStaff extends Model
{
    use HasFactory;

    protected $table = 'survey_abt_staff';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // declare primary as string
    // protected $keyType = 'string';

    protected $fillable = [
        'id',
        'pss_id',
        'staff_type',
        'rating',
    ];

    // protected $casts = [
    //     'created_at' => 'datetime:m-d-Y',
    // ];

    public function hospitalStaffs()
    {
        return $this->hasMany(HospitalStaff::class, 'id', 'staff_type');
    }
}
