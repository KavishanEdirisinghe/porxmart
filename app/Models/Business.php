<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = 'business'; 

    protected $fillable = [
        'id',
        'name',
        'registration_no',
        'business_types_id',
        'user_id',
        'status',
        'created_at',
        'updated_at',
    ];
}
