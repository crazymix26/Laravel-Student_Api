<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Enroll a student in a course
     */
    public function enroll(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'enrollment_date' => 'nullable|date',
            'status' => 'nullable|in:enrolled,completed,dropped'
        ]);

        // Check if enrollment already exists
        $existingEnrollment = Enrollment::where('student_id', $validated['student_id'])
            ->where('course_id', $validated['course_id'])
            ->first();

        if ($existingEnrollment) {
            return response()->json([
                'message' => 'Student is already enrolled in this course',
                'enrollment' => $existingEnrollment
            ], 409);
        }

        $enrollment = Enrollment::create([
            'student_id' => $validated['student_id'],
            'course_id' => $validated['course_id'],
            'enrollment_date' => $validated['enrollment_date'] ?? now(),
            'status' => $validated['status'] ?? 'enrolled'
        ]);

        return response()->json([
            'message' => 'Student enrolled successfully',
            'enrollment' => $enrollment
        ], 201);
    }

    /**
     * Get all courses a student is enrolled in
     */
    public function getStudentCourses($id)
    {
        $student = Student::findOrFail($id);

        $courses = $student->courses()
            ->withPivot('enrollment_date', 'status')
            ->get();

        return response()->json([
            'student' => $student,
            'courses' => $courses
        ]);
    }

    /**
     * Get all students enrolled in a course
     */
    public function getCourseStudents($id)
    {
        $course = Course::findOrFail($id);

        $students = $course->students()
            ->withPivot('enrollment_date', 'status')
            ->get();

        return response()->json([
            'course' => $course,
            'students' => $students
        ]);
    }
}