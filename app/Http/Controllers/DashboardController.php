<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Social;
use App\Models\Comment;
use App\Models\Lecture;
use App\Models\Student;
use App\Models\Instructor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $courses = Course::all();
        $lectures = Lecture::count();
        $users = User::orderBy('created_at', 'desc')->get();
        $comments = Comment::count();
        $students = Student::count();
        $files = File::count();
        $socials = Social::all();
        $admins = Admin::count();
        $instructors = Instructor::count();
        return view('admin.home.index', [
            'courses' => $courses,
            'instructors' => $instructors,
            'admins' => $admins,
            'comments' => $comments,
            'socials' => $socials,
            'files' => $files,
            'students' => $students,
            'users' => $users,
            'lectures' => $lectures,
        ]);
    }
}
