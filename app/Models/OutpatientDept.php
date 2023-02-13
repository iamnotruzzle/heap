<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutpatientDept extends Model
{
    use HasFactory;
    protected $table = 'outpatient_dept';

    protected $fillable = [
        'id',
        'name'
    ];
}
