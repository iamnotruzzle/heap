<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyGenerator extends Model
{
    use HasFactory;

    protected $table = 'key_generator';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // declare primary as string
    // protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'generate',
    ];

    protected $casts = [
        'created_at' => 'datetime:m-d-Y',
    ];
}
