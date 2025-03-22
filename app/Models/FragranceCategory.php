<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FragranceCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'color'];
    
    /**
     * Get the fragrance notes for this category.
     */
    public function fragranceNotes()
    {
        return $this->hasMany(FragranceNote::class, 'category_id');
    }
}