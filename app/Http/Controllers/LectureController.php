<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lecture;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lectures = Lecture::orderBy('created_at', 'DESC')->get();
        return response()->view('admin.lectures.index', [
            'lectures' => $lectures
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
        $lectures = Course::all();
        return response()->view('admin.lectures.create', [
            'courses' => $lectures,
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
            'title' => 'required|string',
            'detail' => 'required|string',
            'video' => 'required|file|mimetypes:video/mp4',
            'course_id' => 'required|integer',
        ]);
        if (!$validator->fails()) {
            $lecture = new Lecture();
            $lecture->title = $request->input('title');
            $lecture->details = $request->input('detail');
            $lecture->course_id = $request->input('course_id');

            $file = $request->file('video');
            $file->move('project/uploads/lectures', $file->getClientOriginalName());
            $file_name = $file->getClientOriginalName();
            $lecture->video = $file_name;

            $issaved = $lecture->save();
            return response()->json(
                ['message' => $issaved ? 'Lecture Created Successfully' : 'Lecture Created Failed'],
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
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        //
        $lectures = Course::all();
        return response()->view('admin.lectures.update', [
            'courses' => $lectures,
            'lecture' => $lecture
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecture $lecture)
    {
        //
        $validator = validator($request->all(), [
            'title' => 'required|string',
            'detail' => 'required|string',
            'video' => 'sometimes|',
            'course_id' => 'required|integer',
        ]);
        if (!$validator->fails()) {
            $lecture->title = $request->input('title');
            $lecture->details = $request->input('detail');
            $lecture->course_id = $request->input('course_id');
            if($request->hasFile('video')){
                $file = $request->file('video');
                if($file){
                    $file->move('project/uploads/lectures', $file->getClientOriginalName());
                    $file_name = $file->getClientOriginalName();
                    $lecture->video = $file_name;
                }
                
            }
            $issaved = $lecture->save();
            return response()->json(
                ['message' => $issaved ? 'Lecture Updated Successfully' : 'Lecture Updated Failed'],
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
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        //
        $isDeleted = $lecture->delete();
        if($isDeleted){
            return response()->json(['icon' => 'success' ,'title' => 'Success!' ,'text' => 'Deleted Successfuly' ,]
            ,Response::HTTP_OK);
        } else {
            return response()->json(['icon' => 'error' ,'title' => 'Failed!' ,'text' => 'Deleted Failed ' ,]
            ,Response::HTTP_BAD_REQUEST);
        }
    }
}
