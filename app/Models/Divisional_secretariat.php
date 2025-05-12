<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisional_secretariat extends Model
{
    protected $table = 'divisional_secretariat'; 

    protected $fillable = [
        'id',
        'divisional_secretariat',
        'district_id',
        'status',
        'created_at',
        'updated_at',
    ];
}
