<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;

class EnrollmentSeeder extends Seeder
{
    public function run()
    {
        // Ensure we have students and courses first
        $students = Student::all();
        $courses = Course::all();

        if ($students->isEmpty() || $courses->isEmpty()) {
            $this->command->warn('Please seed Students and Courses first!');
            return;
        }

        // Create 10 random enrollments
        Enrollment::factory(10)->create();
    }
}