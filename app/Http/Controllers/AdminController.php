<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = Admin::orderBy('created_at', 'DESC')->get();
        return view('admin.admin.index', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.admin.create');
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
            'email' => 'required|email|unique:admins',
            'password' => 'required|string',
            'address' => 'required',
            'phone_number' => 'required|unique:admins|min:3|max:30',
            'country' => 'required'
        ]);
        if (!$validator->fails()) {
            $admin = new Admin();
            $admin->email = $request->input('email');
            $admin->name = $request->input('name');
            $admin->password = Hash::make($request->input('password'));
            $admin->phone_number = $request->input('phone_number');
            $admin->country = $request->input('country');
            $admin->address = $request->input('address');

            if ($request->hasFile('photo')){
                $image = time() .'.'.$request -> photo->extension();
                $request->photo->move(('project/uploads/admins/'),$image);
                $admin->photo = $image;
            }


            $issaved = $admin->save();
            return response()->json(
                ['message' => $issaved ? 'Admin Created successfully' : 'Admin Created failed'],
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
        return view('admin.admin.update', ['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
        $validator = Validator($request->all(),[
            'email' => 'required|email',
            'password' => 'string',
            'address' => 'required',
            'country' => 'required'
        ]);

        if(!$validator->fails()){
            //TODO: CREAT NEW CATEGORY في حال نجاح الفاليديشن
            $admin->name = $request->get('name');
            $admin->email = $request->get('email');
            $admin->phone_number = $request->input('phone_number');
            $admin->country = $request->input('country');
            $admin->address = $request->input('address');
            if ($request->hasFile('photo')){
                $image = time() .'.'.$request -> photo->extension();
                $request->photo->move(('project/uploads/admins/'),$image);
                $admin->photo = $image;
            }


            $isUpdated = $admin->save();


            return response()->json([
                'message' => $isUpdated ? "Admin Updated Successfully" : "Failed to Update"
            ], $isUpdated ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        }else{
            //VALIDATION FAILED في حال فشل الفاليديشن
            return response()->json([
                'message' => $validator->getMessageBag()->first() //قلتلو روحلي على حقيبة الاخطاء وهاتلي اول خطأ
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
        $isDeleted = $admin->delete();
        if($isDeleted){
            return response()->json(['icon' => 'success' ,'title' => 'Success!' ,'text' => 'Deleted Successfuly' ,]
            ,Response::HTTP_OK);
        } else {
            return response()->json(['icon' => 'error' ,'title' => 'Failed!' ,'text' => 'Deleted Failed ' ,]
            ,Response::HTTP_BAD_REQUEST);
        }
    }
}
