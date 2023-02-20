<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAccount extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';
    // protected $table = 'hpatacct';
    protected $table = 'hadmlog';
    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'hpercode',
    ];
}
