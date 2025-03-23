<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FragranceNote extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id'];

    /**
     * Get the category that owns the fragrance note.
     */
    public function category()
    {
        return $this->belongsTo(FragranceCategory::class, 'category_id');
    }
}
