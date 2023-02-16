<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAccount extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv2';
    protected $table = 'hpatacct';
    protected $primaryKey = 'paacctno';
    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'paacctno',
        'enccode',
        'hpercode',
        'upicode',
        'padteas',
        'patmeas',
        'patotchrg',
        'patotprof',
        'patotamt',
        'patotdisc',
        'patmsstot',
        'panetamt',
        'papay',
        'pabal',
        'pastat',
        'palock',
        'datemod',
        'updsw',
        'confdl',
        'ptdisc',
        'paphic',
    ];
}
