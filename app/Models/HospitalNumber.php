<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalNumber extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';
    // protected $table = 'hpatacct';
    protected $table = 'henctr';
    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'hpercode',
        'encstat'
    ];
}
