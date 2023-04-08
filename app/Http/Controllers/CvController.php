<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cvs = Cv::all();
        return view('admin.cv.index', [
            'cvs' => $cvs
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
        return view('admin.cv.create', [
            'instructors' => $instructors
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
            'cv' => 'required|string',
            'instructor_id' => 'required|integer',

        ]);
        if (!$validator->fails()) {
            $cv = new Cv();
            $cv->cv = $request->input('cv');
            $cv->instructor_id = $request->input('instructor_id');


            $issaved = $cv->save();
            return response()->json(
                ['message' => $issaved ? 'Instructor Cv Created Successfully' : 'Instructor Cv Created Failed'],
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
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function show(Cv $cv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function edit(Cv $cv)
    {
        //
        $instructors = Instructor::all();
        return view('admin.cv.update', [
            'instructors' => $instructors,
            'cv' => $cv
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cv $cv)
    {
        //
        $validator = validator($request->all(), [
            'cv' => 'required|string',
            'instructor_id' => 'required|integer',

        ]);
        if (!$validator->fails()) {
            $cv->cv = $request->input('cv');
            $cv->instructor_id = $request->input('instructor_id');


            $issaved = $cv->save();
            return response()->json(
                ['message' => $issaved ? 'Instructor Cv Updated Successfully' : 'Instructor Cv Updated Failed'],
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
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cv $cv)
    {
        //
        $isDeleted = $cv->delete();
        if($isDeleted){
            return response()->json(['icon' => 'success' ,'title' => 'Success!' ,'text' => 'Deleted Successfuly' ,]
            ,Response::HTTP_OK);
        } else {
            return response()->json(['icon' => 'error' ,'title' => 'Failed!' ,'text' => 'Deleted Failed ' ,]
            ,Response::HTTP_BAD_REQUEST);
        }
    }
}
