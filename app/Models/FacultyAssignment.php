<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FacultyAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'domain',
        'faculty_id',
    ];

    /**
     * Get the department this assignment belongs to.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the faculty member assigned to this role.
     */
    public function faculty(): BelongsTo
    {
        return $this->belongsTo(User::class, 'faculty_id');
    }
}
