<?php

namespace Database\Factories;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    protected $model = Enrollment::class;

    public function definition()
    {
        return [
            'student_id' => Student::inRandomOrder()->first()?->id ?? Student::factory(),
            'course_id' => Course::inRandomOrder()->first()?->id ?? Course::factory(),
            'enrollment_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['enrolled', 'completed', 'dropped']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}