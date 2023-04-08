<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $activities = Activity::orderBy('created_at', 'DESC')->get();
        return view('admin.activities.index', [
            'activities' => $activities
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
        return view('admin.activities.create');
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
            'file' => 'required',
            'type' => 'required',

        ]);
        if (!$validator->fails()) {
            $activity = new Activity();
            $activity->type = $request->input('type');
            if ($request->hasFile('file')){
                // $image = time() .'.'.$request -> file->extension();
                // $request->file->move(public_path('project/uploads/activities/'),$image);
                // $activity->file = $image;
                $file = $request->file('file');
                $file->move(('project/uploads/activities/'), $file->getClientOriginalName());
                $file_name = $file->getClientOriginalName();
                $activity->file = $file_name;
            }

            $issaved = $activity->save();
            return response()->json(
                ['message' => $issaved ? 'Activity Created Successfully' : 'Activity Created Failed'],
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
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
        return view('admin.activities.update', [
            'activity' => $activity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
        $validator = validator($request->all(), [
            'file' => 'required',
            'type' => 'required',
        ]);
        if (!$validator->fails()) {
            $activity->type = $request->input('type');
            if ($request->hasFile('file')){
                // $image = time() .'.'.$request -> file->extension();
                // $request->file->move(public_path('project/uploads/activities/'),$image);
                // $activity->file = $image;
                $file = $request->file('file');
                $file->move(('project/uploads/activities/'), $file->getClientOriginalName());
                $file_name = $file->getClientOriginalName();
                $activity->file = $file_name;
            }

            $issaved = $activity->save();
            return response()->json(
                ['message' => $issaved ? 'Activity Updated Successfully' : 'Activity Updated Failed'],
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
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
        $isDeleted = $activity->delete();
        if($isDeleted){
            return response()->json(['icon' => 'success' ,'title' => 'Success!' ,'text' => 'Deleted Successfuly' ,]
            ,Response::HTTP_OK);
        } else {
            return response()->json(['icon' => 'error' ,'title' => 'Failed!' ,'text' => 'Deleted Failed ' ,]
            ,Response::HTTP_BAD_REQUEST);
        }
    }
}
