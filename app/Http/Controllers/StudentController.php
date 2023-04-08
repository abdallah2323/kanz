<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = User::orderBy('created_at', 'DESC')->get();
        return view('admin.students.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        $courses = Course::all();
        return view('admin.students.create', [
            'users' => $users,
            'courses' => $courses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $validator = validator($request->all(), [
        //     'course_id' => 'required|integer',
        //     'user_id' => 'required|integer',

        // ]);
        // if (!$validator->fails()) {
        //     $student = new Student();
        //     $student->user_id = $request->input('user_id');
        //     $student->course_id = $request->input('course_id');


        //     $issaved = $student->save();
        //     return response()->json(
        //         ['message' => $issaved ? 'Student Created successfully' : 'Student Created failed'],
        //         $issaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        //     );
        // } else {
        //     return response()->json(
        //         [
        //             'message' => $validator->getMessageBag()->first()
        //         ],
        //         Response::HTTP_BAD_REQUEST

        //     );
        // }
        $user = $request->get('user_id');
        $course = $request->get('course_id');

        $student_check = Student::where('user_id', '=', $user)->where('course_id', '=', $course)->first();
        if(!$student_check){
            $validator = validator($request->all(), [
                'course_id' => 'required|integer',
                'user_id' => 'required|integer',

            ]);
            if (!$validator->fails()) {
                $student = new Student();
                $student->user_id = $request->input('user_id');
                $student->course_id = $request->input('course_id');


                $issaved = $student->save();
                return response()->json(
                    ['message' => $issaved ? 'Student Registered Successfully' : 'حدث خطأ ما في عملية التسجيل'],
                    $issaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
                );
            } else {
                return response()->json(
                    [
                        'message' => $validator->getMessageBag()->first()
                    ],
                    Response::HTTP_BAD_REQUEST

                );
            }
        } else {
            return response()->json([
                'code'      =>  400,
                'message'   =>  $student_check ? 'Student'.' '.$student_check->user->name.' '.'is actually registered in'.' '.$student_check->course->name. ' '.'course' : 'Failed'
            ], $student_check ? Response::HTTP_BAD_REQUEST : Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student = Student::find($id);
        $isDeleted = $student->delete();
        if($isDeleted){
            return response()->json(['icon' => 'success' ,'title' => 'Success!' ,'text' => 'Deleted Successfuly' ,]
            ,Response::HTTP_OK);
        } else {
            return response()->json(['icon' => 'error' ,'title' => 'Failed!' ,'text' => 'Deleted Failed ' ,]
            ,Response::HTTP_BAD_REQUEST);
        }
    }
}
