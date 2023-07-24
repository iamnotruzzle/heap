<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLocations extends Model
{
    use HasFactory;

    protected $table = 'user_locations';

    protected $fillable = [
        'id',
        'wardcode',
        'user_id'
    ];

    public function pssLocationDetail()
    {
        return $this->hasOne(PssLocation::class, 'wardcode', 'wardcode');
    }

    public function wardLocationDetail()
    {
        return $this->hasOne(Ward::class, 'wardcode', 'wardcode');
    }
}
