<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\CoursePublication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function createCourse(CourseRequest $request) {
        Course::create([...$request->validated(), 'user_id' => Auth::id()]);

        return redirect()->route('courses');
    }

    public function getCourses() {
        return view('courses.courses-list', ['courses' => Course::get()]);
    }

    public function getCoursePublications(Course $course) {
        return view('courses.course', ['course_publications' => $course->publications]);
    }
}
