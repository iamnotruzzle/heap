<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherDepartment extends Model
{
    use HasFactory;
    protected $table = 'other_departments';

    protected $fillable = [
        'id',
        'name'
    ];
}
