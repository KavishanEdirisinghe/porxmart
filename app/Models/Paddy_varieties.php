<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paddy_varieties extends Model
{
    protected $table = 'paddy_varieties'; 
    protected $fillable = [
        'name',
        'description',
        'harvest_time',
        'average_yield',
        'pericarp_colour',
        'status',
        'created_at',
        'updated_at'
    ];

    
}
