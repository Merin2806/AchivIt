<?php

namespace Database\Seeders;

use App\Models\FacultyAssignment;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Seeder;

class FacultyAssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $assignments = [
            // Information Technology (IT)
            [
                'department_code' => 'IT',
                'domain' => 'Academic',
                'faculty_name' => 'Dr. Priya Nair',
            ],
            [
                'department_code' => 'IT',
                'domain' => 'Extra-Curricular',
                'faculty_name' => 'Prof. Rahul Sharma',
            ],
            // Computer Engineering (COMP)
            [
                'department_code' => 'COMP',
                'domain' => 'Academic',
                'faculty_name' => 'Dr. Sneha Patil',
            ],
            [
                'department_code' => 'COMP',
                'domain' => 'Extra-Curricular',
                'faculty_name' => 'Prof. Amit Joshi',
            ],
            // Electronics & Telecommunication (EXTC)
            [
                'department_code' => 'EXTC',
                'domain' => 'Academic',
                'faculty_name' => 'Dr. Kavita Desai',
            ],
            [
                'department_code' => 'EXTC',
                'domain' => 'Extra-Curricular',
                'faculty_name' => 'Prof. Neha Kulkarni',
            ],
            // Electronics (ELEC)
            [
                'department_code' => 'ELEC',
                'domain' => 'Academic',
                'faculty_name' => 'Dr. Anil Mehta',
            ],
            [
                'department_code' => 'ELEC',
                'domain' => 'Extra-Curricular',
                'faculty_name' => 'Prof. Ritu Singh',
            ],
            // Mechanical (MECH)
            [
                'department_code' => 'MECH',
                'domain' => 'Academic',
                'faculty_name' => 'Dr. Sandeep Patil',
            ],
            [
                'department_code' => 'MECH',
                'domain' => 'Extra-Curricular',
                'faculty_name' => 'Prof. Vivek Nair',
            ],
        ];

        foreach ($assignments as $assignment) {
            $department = Department::where('code', $assignment['department_code'])->first();
            $faculty = User::where('name', $assignment['faculty_name'])->first();

            FacultyAssignment::create([
                'department_id' => $department?->id,
                'domain' => $assignment['domain'],
                'faculty_id' => $faculty?->id,
            ]);
        }
    }
}
