<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBlend extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'notes', 'perfume_name', 'recommended_perfume_id'];

    /**
     * Get the user that owns the blend.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the recommended perfume for this blend.
     */
    public function recommendedPerfume()
    {
        return $this->belongsTo(PerfumeRecommendation::class, 'recommended_perfume_id');
    }
}
