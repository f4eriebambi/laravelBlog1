<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBlend extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'user_id', 
        'notes', 
        'perfume_name', 
        'recommended_perfume_id',
        'created_at',
        'colors'
    ];
    
    protected $dates = [
        'created_at' // Add this line to cast to Carbon
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recommendedPerfume()
    {
        return $this->belongsTo(PerfumeRecommendation::class, 'recommended_perfume_id');
    }
}