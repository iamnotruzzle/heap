<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalStaff extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';
    protected $table = 'hospital_staff';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // declare primary as string
    // protected $keyType = 'string';

    protected $fillable = [
        'id',
        'type',
    ];

    protected $casts = [
        'created_at' => 'datetime:m-d-Y',
    ];
}
