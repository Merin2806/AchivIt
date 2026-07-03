<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['student', 'faculty', 'admin'])->default('student')->after('email_verified_at');
            $table->string('phone')->nullable()->after('role');
            $table->string('roll_no')->nullable()->unique()->after('phone');
            $table->foreignId('department_id')->nullable()->constrained('departments')->cascadeOnDelete()->after('roll_no');
            $table->integer('year')->nullable()->after('department_id');
            $table->integer('semester')->nullable()->after('year');
            $table->string('batch')->nullable()->after('semester');
            $table->enum('faculty_role', ['Academic Coordinator', 'Student Activity Coordinator'])->nullable()->after('batch');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role',
                'phone',
                'roll_no',
                'department_id',
                'year',
                'semester',
                'batch',
                'faculty_role',
            ]);
        });
    }
};
