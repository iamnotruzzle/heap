<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PssLocation extends Model
{
    use HasFactory;

    protected $table = 'Locations';

    protected $fillable = [
        'wardcode',
        'wardname',
    ];
}
