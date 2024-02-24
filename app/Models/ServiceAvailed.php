<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceAvailed extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'id',
        'name',
        'status',
    ];
}
