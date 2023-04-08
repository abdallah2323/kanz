<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $instructors = Instructor::orderBy('created_at', 'DESC')->get();
        return view('admin.instructors.index', [
            'instructors' => $instructors,
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
        return view('admin.instructors.create');
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
            'email' => 'required|email|unique:instructors',
            'password' => 'required|string',
            'address' => 'required',
            'country' => 'required',
            'phone_number' => 'required|unique:instructors|min:3|max:30',

        ]);
        if (!$validator->fails()) {
            $instructor = new Instructor();
            $instructor->email = $request->input('email');
            $instructor->name = $request->input('name');
            $instructor->password = Hash::make($request->input('password'));
            $instructor->phone_number = $request->input('phone_number');
            $instructor->gender = $request->input('gender');
            $instructor->country = $request->input('country');
            $instructor->address = $request->input('address');
            $instructor->specialty = $request->input('specialty');

            if ($request->hasFile('photo')){
                $image = time() .'.'.$request -> photo->extension();
                $request->photo->move(('project/uploads/instructors/'),$image);
                $instructor->photo = $image;
            }


            $issaved = $instructor->save();
            return response()->json(
                ['message' => $issaved ? 'Instructor Created Successfully' : 'Instructor Created Failed'],
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
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
        return view('admin.instructors.courses', [
            'instructor' => $instructor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        //
        return view('admin.instructors.update', [
            'instructor' => $instructor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
        //
        $validator = validator($request->all(), [
            'email' => 'required|email',
            'address' => 'required',
            'country' => 'required',
        ]);
        if (!$validator->fails()) {
            $instructor->email = $request->input('email');
            $instructor->name = $request->input('name');
            $instructor->password = Hash::make($request->input('password'));
            $instructor->phone_number = $request->input('phone_number');
            $instructor->gender = $request->input('gender');
            $instructor->country = $request->input('country');
            $instructor->address = $request->input('address');
            $instructor->specialty = $request->input('specialty');

            if ($request->hasFile('photo')){
                $image = time() .'.'.$request -> photo->extension();
                $request->photo->move(('project/uploads/instructors/'),$image);
                $instructor->photo = $image;
            }


            $issaved = $instructor->save();
            return response()->json(
                ['message' => $issaved ? 'Instructor Updated Successfully' : 'Instructor Updated Failed'],
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
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        //
        $isDeleted = $instructor->delete();
        if($isDeleted){
            return response()->json(['icon' => 'success' ,'title' => 'Success!' ,'text' => 'Deleted Successfuly' ,]
            ,Response::HTTP_OK);
        } else {
            return response()->json(['icon' => 'error' ,'title' => 'Failed!' ,'text' => 'Deleted Failed ' ,]
            ,Response::HTTP_BAD_REQUEST);
        }
    }
}
