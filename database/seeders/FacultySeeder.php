<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('Password@123');

        $faculties = [
            // Information Technology (IT)
            [
                'name' => 'Dr. Priya Nair',
                'email' => 'priya.nair@fcrit.ac.in',
                'department_code' => 'IT',
                'faculty_role' => 'Academic Coordinator',
                'phone' => '9876543210',
            ],
            [
                'name' => 'Prof. Rahul Sharma',
                'email' => 'rahul.sharma@fcrit.ac.in',
                'department_code' => 'IT',
                'faculty_role' => 'Student Activity Coordinator',
                'phone' => '9876543211',
            ],
            // Computer Engineering (COMP)
            [
                'name' => 'Dr. Sneha Patil',
                'email' => 'sneha.patil@fcrit.ac.in',
                'department_code' => 'COMP',
                'faculty_role' => 'Academic Coordinator',
                'phone' => '9876543212',
            ],
            [
                'name' => 'Prof. Amit Joshi',
                'email' => 'amit.joshi@fcrit.ac.in',
                'department_code' => 'COMP',
                'faculty_role' => 'Student Activity Coordinator',
                'phone' => '9876543213',
            ],
            // Electronics & Telecommunication (EXTC)
            [
                'name' => 'Dr. Kavita Desai',
                'email' => 'kavita.desai@fcrit.ac.in',
                'department_code' => 'EXTC',
                'faculty_role' => 'Academic Coordinator',
                'phone' => '9876543214',
            ],
            [
                'name' => 'Prof. Neha Kulkarni',
                'email' => 'neha.kulkarni@fcrit.ac.in',
                'department_code' => 'EXTC',
                'faculty_role' => 'Student Activity Coordinator',
                'phone' => '9876543215',
            ],
            // Electronics (ELEC)
            [
                'name' => 'Dr. Anil Mehta',
                'email' => 'anil.mehta@fcrit.ac.in',
                'department_code' => 'ELEC',
                'faculty_role' => 'Academic Coordinator',
                'phone' => '9876543216',
            ],
            [
                'name' => 'Prof. Ritu Singh',
                'email' => 'ritu.singh@fcrit.ac.in',
                'department_code' => 'ELEC',
                'faculty_role' => 'Student Activity Coordinator',
                'phone' => '9876543217',
            ],
            // Mechanical (MECH)
            [
                'name' => 'Dr. Sandeep Patil',
                'email' => 'sandeep.patil@fcrit.ac.in',
                'department_code' => 'MECH',
                'faculty_role' => 'Academic Coordinator',
                'phone' => '9876543218',
            ],
            [
                'name' => 'Prof. Vivek Nair',
                'email' => 'vivek.nair@fcrit.ac.in',
                'department_code' => 'MECH',
                'faculty_role' => 'Student Activity Coordinator',
                'phone' => '9876543219',
            ],
        ];

        foreach ($faculties as $facultyData) {
            $department = Department::where('code', $facultyData['department_code'])->first();

            User::create([
                'name' => $facultyData['name'],
                'email' => $facultyData['email'],
                'password' => $password,
                'role' => 'faculty',
                'faculty_role' => $facultyData['faculty_role'],
                'phone' => $facultyData['phone'],
                'department_id' => $department?->id,
            ]);
        }
    }
}
