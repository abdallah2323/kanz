<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::orderBy('created_at', 'DESC')->get();
        return view('admin.courses.index', [
            'courses' => $courses,
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
        $instructors = Instructor::all();
        $materials = Material::all();
        return view('admin.courses.create', [
            'instructors' => $instructors,
            'materials' => $materials,
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
        $validator = validator($request->all(), [
            'name' => 'required',
            'brief' => 'required',
            'type' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif',
            'description' => 'required|string',
            'instructor_id' => 'required|integer',
            'material_id' => 'required|integer',
            'video' => 'file|mimetypes:video/mp4',

        ]);
        if (!$validator->fails()) {
            $course = new Course();
            $course->name = $request->input('name');
            $course->brief = $request->input('brief');
            $course->type = $request->input('type');
            $course->price = $request->input('price');
            $course->description = $request->input('description');
            $course->instructor_id = $request->input('instructor_id');
            $course->material_id = $request->input('material_id');

            $file = $request->file('explanatory');
            $file->move('project/uploads/courses/explanatory', $file->getClientOriginalName());
            $file_name = $file->getClientOriginalName();
            $course->explanatory = $file_name;

            if ($request->hasFile('image')){
                $image = time() .'.'.$request -> image->extension();
                $request->image->move(('project/uploads/courses/'),$image);
                $course->image = $image;
            }

            $issaved = $course->save();
            return response()->json(
                ['message' => $issaved ? 'Course Created Successfully' : 'Course Created Failed'],
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
        return view('admin.courses.show', [
            'course' => $course
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
        $instructors = Instructor::all();
        $materials = Material::all();
        return view('admin.courses.update', [
            'course' => $course,
            'materials' => $materials,
            'instructors' => $instructors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
        $validator = validator($request->all(), [
            'name' => 'required',
            'brief' => 'required',
            'type' => 'required',
            'description' => 'required|string',
            'instructor_id' => 'required|integer',
            'material_id' => 'required|integer',
        ]);
        if (!$validator->fails()) {
            $course->name = $request->input('name');
            $course->brief = $request->input('brief');
            $course->type = $request->input('type');
            $course->price = $request->input('price');
            $course->description = $request->input('description');
            $course->instructor_id = $request->input('instructor_id');
            $course->material_id = $request->input('material_id');

            $file = $request->file('explanatory');
            $file->move('project/uploads/courses/explanatory', $file->getClientOriginalName());
            $file_name = $file->getClientOriginalName();
            $course->explanatory = $file_name;

            if ($request->hasFile('image')){
                $image = time() .'.'.$request -> image->extension();
                $request->image->move(('project/uploads/courses/'),$image);
                $course->image = $image;
            }

            $issaved = $course->save();
            return response()->json(
                ['message' => $issaved ? 'Course Updated Successfully' : 'Course Updated Failed'],
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
        $isDeleted = $course->delete();
        if($isDeleted){
            return response()->json(['icon' => 'success' ,'title' => 'Success!' ,'text' => 'Deleted Successfuly' ,]
            ,Response::HTTP_OK);
        } else {
            return response()->json(['icon' => 'error' ,'title' => 'Failed!' ,'text' => 'Deleted Failed ' ,]
            ,Response::HTTP_BAD_REQUEST);
        }
    }
}
