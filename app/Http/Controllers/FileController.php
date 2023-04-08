<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Course;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $files = File::orderBy('created_at', 'DESC')->get();
        return response()->view('admin.files.index', [
            'files' => $files
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
        $courses = Course::all();
        return response()->view('admin.files.create', [
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
        $validator = validator($request->all(), [
            'name' => 'required|string',
            'type' => 'required|string',
            'file' => 'required|mimes:doc,docx,pdf',
            'course_id' => 'required|integer',
        ]);
        if (!$validator->fails()) {
            $file = new File();
            $file->name = $request->input('name');
            $file->type = $request->input('type');
            $file->course_id = $request->input('course_id');

            $data = $request->file;
            // $filename = time().'.'.$data->getClientOriginalExtension();
            // $filename = 'Al-Kanz-Academy'.$data->getClientOriginalExtension();
            $filename = 'Al-Kanz-Academy'.'-'.$data->getClientOriginalName();
            $request->file->move('project/uploads/files', $filename);

            $file->file = $filename;


            $issaved = $file->save();
            return response()->json(
                ['message' => $issaved ? 'File Created Successfully' : 'File Created Failed'],
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
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
        $courses = Course::all();
        return response()->view('admin.files.update', [
            'courses' => $courses,
            'file' => $file
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
        $validator = validator($request->all(), [
            'name' => 'required|string',
            'type' => 'required|string',
            'file' => 'required',
            'course_id' => 'required|integer',
        ]);
        if (!$validator->fails()) {
            $file->name = $request->input('name');
            $file->type = $request->input('type');
            $file->course_id = $request->input('course_id');

            $data = $request->file;
            $filename = 'Al-Kanz-Academy'.'-'.$data->getClientOriginalName();
            $request->file->move('project/uploads/files', $filename);

            $file->file = $filename;


            $issaved = $file->save();
            return response()->json(
                ['message' => $issaved ? 'File Updated Successfully' : 'File Updated Failed'],
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
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
        $isDeleted = $file->delete();
        if($isDeleted){
            return response()->json(['icon' => 'success' ,'title' => 'Success!' ,'text' => 'Deleted Successfuly' ,]
            ,Response::HTTP_OK);
        } else {
            return response()->json(['icon' => 'error' ,'title' => 'Failed!' ,'text' => 'Deleted Failed ' ,]
            ,Response::HTTP_BAD_REQUEST);
        }
    }
}
