<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain',
        'category_name',
    ];

    /**
     * Get all achievements in this category.
     */
    public function achievements(): HasMany
    {
        return $this->hasMany(Achievement::class);
    }
}
