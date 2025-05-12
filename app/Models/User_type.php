<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_type extends Model
{
    protected $table = 'user_type'; 

    protected $fillable = [
        'id',
        'type',
        'count',
        'status',
        'created_at',
        'updated_at',
    ];
}
