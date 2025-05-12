<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user'; 

    protected $fillable = [
        'id',
        'nic',
        'name',
        'contact_no',
        'user_type_id',
        'email',
        'password',
        'status',
        'created_at',
        'updated_at',
    ];
}
