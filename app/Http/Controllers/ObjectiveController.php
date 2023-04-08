<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Objective;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ObjectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objectives = Objective::orderBy('created_at', 'DESC')->get();
        return view('admin.objectives.index', [
            'objectives' => $objectives
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
        return response()->view('admin.objectives.create', [
            'courses' => $courses
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
            'course_id' => 'required',

        ]);
        if (!$validator->fails()) {
            $objective = new Objective();
            $objective->title = $request->input('title');
            $objective->course_id = $request->input('course_id');


            $issaved = $objective->save();
            return response()->json(
                ['message' => $issaved ? 'Course Objective Created successfully' : 'Course Objective Created failed'],
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
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function show(Objective $objective)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function edit(Objective $objective)
    {
        //
        $courses = Course::all();
        return response()->view('admin.objectives.update', [
            'objective' => $objective,
            'courses' => $courses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Objective $objective)
    {
        //
        $validator = validator($request->all(), [
            'title' => 'required|string',
            'course_id' => 'required',

        ]);
        if (!$validator->fails()) {
            $objective->title = $request->input('title');
            $objective->course_id = $request->input('course_id');


            $issaved = $objective->save();
            return response()->json(
                ['message' => $issaved ? 'Course Objective Updated successfully' : 'Course Objective Updated failed'],
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
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objective $objective)
    {
        //
        $isDeleted = $objective->delete();
        if($isDeleted){
            return response()->json(['icon' => 'success' ,'title' => 'Success!' ,'text' => 'Deleted Successfuly' ,]
            ,Response::HTTP_OK);
        } else {
            return response()->json(['icon' => 'error' ,'title' => 'Failed!' ,'text' => 'Deleted Failed ' ,]
            ,Response::HTTP_BAD_REQUEST);
        }
    }
}
