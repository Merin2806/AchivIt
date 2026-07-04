<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'Information Technology', 'code' => 'IT'],
            ['name' => 'Computer Engineering', 'code' => 'COMP'],
            ['name' => 'Electronics & Telecommunication', 'code' => 'EXTC'],
            ['name' => 'Electronics', 'code' => 'ELEC'],
            ['name' => 'Mechanical', 'code' => 'MECH'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
