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
        Schema::create('faculty_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
            $table->enum('domain', ['Academic', 'Extra-Curricular']);
            $table->foreignId('faculty_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            
            $table->unique(['department_id', 'domain']);
            $table->index(['faculty_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_assignments');
    }
};
