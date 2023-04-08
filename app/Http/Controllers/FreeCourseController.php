<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class FreeCourseController extends Controller
{
    //
    public function freeCourses()
    {
        $courses = Course::whereNull('price')->orderBy('created_at', 'DESC')->get();
        return view('admin.free-courses.index', [
            'courses' => $courses
        ]);
    }

    public function paidCourses()
    {
        $courses = Course::whereNotNull('price')->orderBy('created_at', 'DESC')->get();
        return view('admin.paid-courses.index', [
            'courses' => $courses
        ]);
    }

    public function psychologicalCourses()
    {
        $courses = Course::where('type', '=', 'psychological')->orderBy('created_at', 'DESC')->get();
        return view('admin.psychological-courses.index', [
            'courses' => $courses
        ]);
    }

}
