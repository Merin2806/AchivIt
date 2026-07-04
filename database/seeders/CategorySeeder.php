<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // Academic
            ['domain' => 'Academic', 'category_name' => 'Internship'],
            ['domain' => 'Academic', 'category_name' => 'Hackathon'],
            ['domain' => 'Academic', 'category_name' => 'Project'],
            ['domain' => 'Academic', 'category_name' => 'Research Paper'],
            ['domain' => 'Academic', 'category_name' => 'Seminar'],
            ['domain' => 'Academic', 'category_name' => 'Workshop'],
            ['domain' => 'Academic', 'category_name' => 'Certification'],
            ['domain' => 'Academic', 'category_name' => 'Technical Competition'],
            ['domain' => 'Academic', 'category_name' => 'Patent'],
            ['domain' => 'Academic', 'category_name' => 'Publication'],
            ['domain' => 'Academic', 'category_name' => 'Training Program'],
            
            // Extra-Curricular
            ['domain' => 'Extra-Curricular', 'category_name' => 'Sports'],
            ['domain' => 'Extra-Curricular', 'category_name' => 'Dance'],
            ['domain' => 'Extra-Curricular', 'category_name' => 'Music'],
            ['domain' => 'Extra-Curricular', 'category_name' => 'Drama'],
            ['domain' => 'Extra-Curricular', 'category_name' => 'Photography'],
            ['domain' => 'Extra-Curricular', 'category_name' => 'Art'],
            ['domain' => 'Extra-Curricular', 'category_name' => 'NSS'],
            ['domain' => 'Extra-Curricular', 'category_name' => 'NCC'],
            ['domain' => 'Extra-Curricular', 'category_name' => 'Debate'],
            ['domain' => 'Extra-Curricular', 'category_name' => 'Quiz'],
            ['domain' => 'Extra-Curricular', 'category_name' => 'Cultural Event'],
            ['domain' => 'Extra-Curricular', 'category_name' => 'Volunteer Work'],
            ['domain' => 'Extra-Curricular', 'category_name' => 'Other'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
