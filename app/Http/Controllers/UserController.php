<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('admin.users.index', [
            'users' => $users
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
        $educations = Education::all();
        $levels = Level::all();
        return view('admin.users.create', [
            'educations' => $educations,
            'levels' => $levels
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
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'birth' => 'required|date',
            'name' => 'required|string|unique:users',
            'gender' => 'required',
            'code' => 'required',
            'phone_number' => 'required|unique:users|min:3|max:30',
            'education_id' => 'required',
            'level_id' => 'required',
            'address' => 'required',
            'country' => 'required'
        ]);
        if (!$validator->fails()) {
            $user = new User();
            $user->email = $request->input('email');
            $user->name = $request->input('name');
            $user->date_of_birth = $request->input('birth');
            $user->password = Hash::make($request->input('password'));
            $user->phone_number = $request->input('phone_number');
            $user->code = $request->input('code');
            $user->gender = $request->input('gender');
            $user->country = $request->input('country');
            $user->address = $request->input('address');
            $user->education_id = $request->input('education_id');
            $user->level_id = $request->input('level_id');
            $user->image = $request->input('photo');




            $issaved = $user->save();
            return response()->json(
                ['message' => $issaved ? 'User Created successfully' : 'User Created failed'],
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $educations = Education::all();
        $levels = Level::all();
        return view('admin.users.update', [
            'user' => $user,
            'educations' => $educations,
            'levels' => $levels
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $validator = validator($request->all(), [
            'email' => 'required|email',
            'birth' => 'required|date',
            'name' => 'required|string',
            'gender' => 'required',
            'code' => 'required',
            'phone_number' => 'required|min:3|max:30',
            'education_id' => 'required',
            'level_id' => 'required',
            'address' => 'required',
            'country' => 'required'
        ]);
        if (!$validator->fails()) {
            $user->email = $request->input('email');
            $user->name = $request->input('name');
            $user->date_of_birth = $request->input('birth');
            $user->password = Hash::make($request->input('password'));
            $user->phone_number = $request->input('phone_number');
            $user->code = $request->input('code');
            $user->gender = $request->input('gender');
            $user->country = $request->input('country');
            $user->address = $request->input('address');
            $user->education_id = $request->input('education_id');
            $user->level_id = $request->input('level_id');

            if ($request->hasFile('photo')){
                $image = time() .'.'.$request -> photo->extension();
                $request->photo->move(('project/uploads/users/'),$image);
                $user->image = $image;
            }


            $issaved = $user->save();
            return response()->json(
                ['message' => $issaved ? 'User Updated Successfully' : 'User Updated Failed'],
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $isDeleted = $user->delete();
        if($isDeleted){
            return response()->json(['icon' => 'success' ,'title' => 'Success!' ,'text' => 'Deleted Successfuly' ,]
            ,Response::HTTP_OK);
        } else {
            return response()->json(['icon' => 'error' ,'title' => 'Failed!' ,'text' => 'Deleted Failed ' ,]
            ,Response::HTTP_BAD_REQUEST);
        }
    }
}
