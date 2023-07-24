<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    // hospital database
    protected $connection = 'sqlsrv';

    protected $table = 'hward';

    protected $fillable = [
        'wardcode',
        'wardname'
    ];
}
