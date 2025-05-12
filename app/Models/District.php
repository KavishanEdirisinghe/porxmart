<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'district'; 

    protected $fillable = [
        'id',
        'district',
        'province_id',
        'status',
        'created_at',
        'updated_at',
    ];
}
