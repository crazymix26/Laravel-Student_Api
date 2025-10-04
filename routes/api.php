<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentController;


//Test Route
Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});
//Get all courses
Route::get('/courses', [CourseController::class, 'index']);

//Get a single course   
Route::get('/courses/{id}', [CourseController::class, 'show']);

//Create a new course
Route::post('/courses', [CourseController::class, 'store']);

//Update a course
Route::put('/courses/{id}', [CourseController::class, 'update']);

//Delete a course
Route::delete('/courses/{id}', [CourseController::class, 'destroy']);




//Enroll a student in a course
Route::post('/enrollments', [EnrollmentController::class, 'enroll']);           

//Get all courses a student is enrolled in
Route::get('/students/{id}/courses', [EnrollmentController::class, 'getStudentCourses']);

//Get all students enrolled in a course
Route::get('/courses/{id}/students', [EnrollmentController::class, 'getCourseStudents']);   

