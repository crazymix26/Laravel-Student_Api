<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Enrollment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 students with unique emails
        for ($i = 0; $i < 10; $i++) {
            Student::factory()->create([
                'first_name' => \Faker\Factory::create()->firstName,
                'last_name' => \Faker\Factory::create()->lastName,
                'email' => \Faker\Factory::create()->unique()->safeEmail,  // Ensure unique email
                'dob' => \Faker\Factory::create()->date('Y-m-d', '2005-12-31'),
                'phone_number' => \Faker\Factory::create()->phoneNumber,
                'address' => \Faker\Factory::create()->address,
            ]);
        }

        $this->call(CourseSeeder::class);
        $this->call(EnrollmentSeeder::class);
    }
}
