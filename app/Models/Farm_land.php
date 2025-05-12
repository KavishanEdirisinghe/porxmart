<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm_land extends Model
{
    protected $table = 'farm_land'; 

    protected $fillable = [
        'id',
        'registraion_no',
        'size',
        'grama_niladhari_division_id',
        'users_id',
        'status',
        'created_at',
        'updated_at',
    ];
}
