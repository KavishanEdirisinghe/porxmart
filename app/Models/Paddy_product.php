<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paddy_product extends Model
{
    protected $table = 'paddy_production';

    protected $fillable = [
        'id',
        'sawn_date',
        'expected_yeild',
        'user_id',
        'fam_land_id',
        'paddy_varieties_id',
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
