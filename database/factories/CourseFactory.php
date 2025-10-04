<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Define a list of IT-related courses and their codes
        $courses = [
            ['course_name' => 'Introduction to Programming', 'course_code' => 'CS101'],
            ['course_name' => 'Data Structures and Algorithms', 'course_code' => 'CS102'],
            ['course_name' => 'Database Management Systems', 'course_code' => 'CS201'],
            ['course_name' => 'Web Development', 'course_code' => 'CS202'],
            ['course_name' => 'Operating Systems', 'course_code' => 'CS301'],
            ['course_name' => 'Computer Networks', 'course_code' => 'CS302'],
            ['course_name' => 'Software Engineering', 'course_code' => 'CS401'],
            ['course_name' => 'Object-Oriented Programming', 'course_code' => 'CS402'],
            ['course_name' => 'Mobile App Development', 'course_code' => 'CS403'],
            ['course_name' => 'Cloud Computing', 'course_code' => 'CS404'],
            ['course_name' => 'Cybersecurity Basics', 'course_code' => 'IT101'],
            ['course_name' => 'Artificial Intelligence', 'course_code' => 'CS501'],
            ['course_name' => 'Machine Learning', 'course_code' => 'CS502'],
            ['course_name' => 'Big Data Analytics', 'course_code' => 'IT202'],
            ['course_name' => 'Human-Computer Interaction', 'course_code' => 'CS503'],
        ];

        // Randomly select a course from the predefined list
        $course = $this->faker->randomElement($courses);

        return [
            'course_name' => $course['course_name'],  // Randomly pick a course name
            'course_code' => $course['course_code'],  // Randomly pick a course code
            'description' => $this->faker->paragraph(),  // Random description of the course
            'credits' => $this->faker->numberBetween(3, 5),  // Random number of credits (3 to 5)
            'created_at' => now(),  // Set the current time for created_at
            'updated_at' => now(),  // Set the current time for updated_at
        ];
    }
}
