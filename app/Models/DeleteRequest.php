<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeleteRequest extends Model
{
    use HasFactory;

    protected $table = 'delete_request';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // declare primary as string
    // protected $keyType = 'string';

    protected $fillable = [
        'id',
        'pss_id',
        'user_id',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime:m-d-Y',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
