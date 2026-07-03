<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'faculty_id',
        'category_id',
        'title',
        'organization',
        'description',
        'achievement_date',
        'certificate',
        'status',
        'remark',
        'reviewed_at',
    ];

    protected $casts = [
        'achievement_date' => 'date',
        'reviewed_at' => 'datetime',
    ];

    /**
     * Get the student who submitted this achievement.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * Get the faculty member who reviewed this achievement.
     */
    public function faculty(): BelongsTo
    {
        return $this->belongsTo(User::class, 'faculty_id');
    }

    /**
     * Get the category this achievement belongs to.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
