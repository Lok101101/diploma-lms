<?php

namespace App\Http\Controllers;

use App\Models\CoursePublication;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function createCourse(Request $request) {
        Course::create($request->all());

        return redirect()->route('courses');
    }

    public function getCourses() {
        return view('courses.courses-list', ['courses' => Course::get()]);
    }

    public function getCoursePublications(Course $course) {
        return view('courses.course', ['course_publications' => $course->publications]);
    }
}
