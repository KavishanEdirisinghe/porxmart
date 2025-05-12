<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grama_niladhari_division extends Model
{
    protected $table = 'grama_niladhari_division'; 

    protected $fillable = [
        'id',
        'grama_niladhari_division',
        'divisional_secretariat_id',
        'status',
        'created_at',
        'updated_at',
    ];
}
