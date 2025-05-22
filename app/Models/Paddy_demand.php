<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paddy_demand extends Model
{
    protected $table = 'paddy_demand';

    protected $fillable = [
        'id',
        'quantity',
        'business_id',
        'user_id',
        'paddy_varieties_id',
        'timing_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function paddy_varieties()
    {
        return $this->belongsTo(Paddy_varieties::class);
    }
}
