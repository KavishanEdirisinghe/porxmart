<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province'; 

    protected $fillable = [
        'id',
        'province',
        'status',
        'created_at',
        'updated_at',
    ];
}
