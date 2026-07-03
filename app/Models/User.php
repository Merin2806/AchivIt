<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role', 'phone', 'roll_no', 'department_id', 'year', 'semester', 'batch', 'faculty_role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the department this user belongs to.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the achievements submitted by this student.
     */
    public function achievements(): HasMany
    {
        return $this->hasMany(Achievement::class, 'student_id');
    }

    /**
     * Get the achievements reviewed by this faculty.
     */
    public function reviewedAchievements(): HasMany
    {
        return $this->hasMany(Achievement::class, 'faculty_id');
    }

    /**
     * Get the faculty assignments for this faculty member.
     */
    public function facultyAssignments(): HasMany
    {
        return $this->hasMany(FacultyAssignment::class, 'faculty_id');
    }
}
