<?php

namespace App\Http\Controllers;

use App\Http\Requests\Coursers\EnrollInCourse;
use App\Models\Course;

class CoursesController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->generalResponse(Course::date()->paginate(10), 'Available Courses');
    }

    public function enrolled()
    {
        $courses = request()->user()->courses()->with('course')->get();
        return $this->generalResponse($courses, 'Enrolled Courses');
    }

    public function enroll(EnrollInCourse $request, Course $course)
    {
        return $request->enroll($course);
    }
}
