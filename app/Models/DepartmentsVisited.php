<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentsVisited extends Model
{
    use HasFactory;

    protected $table = 'departments_visited';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // declare primary as string
    // protected $keyType = 'string';

    protected $fillable = [
        'id',
        'pss_id',
        'department_id',
    ];

    protected $casts = [
        'created_at' => 'datetime:m-d-Y',
    ];
}
