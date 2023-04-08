<?php

namespace App\Http\Controllers;

use App\Models\Main;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Main::orderBy('created_at', 'DESC')->get();
        return view('admin.main.index', [
            'data' => $data
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
        return view('admin.main.create');
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
            'title' => 'string',
            'detail' => 'string',
            'video' => 'file|mimetypes:video/mp4',
        ]);
        if (!$validator->fails()) {
            $main = new Main();
            $main->title = $request->input('title');
            $main->detail = $request->input('detail');

            $file = $request->file('video');
            $file->move('project/uploads/main', $file->getClientOriginalName());
            $file_name = $file->getClientOriginalName();
            $main->video = $file_name;

            $issaved = $main->save();
            return response()->json(
                ['message' => $issaved ? 'Items Created Successfully' : 'Items Created Failed'],
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
     * @param  \App\Models\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function show(Main $main)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $main = Main::find($id);
        return view('admin.main.update', [
            'main' => $main
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = validator($request->all(), [
            'title' => 'string',
            'detail' => 'string',
            'video' => 'file|mimetypes:video/mp4',
        ]);
        if (!$validator->fails()) {
            $main = Main::find($id);
            $main->title = $request->input('title');
            $main->detail = $request->input('detail');

            $file = $request->file('video');
            $file->move('project/uploads/main', $file->getClientOriginalName());
            $file_name = $file->getClientOriginalName();
            $main->video = $file_name;

            $issaved = $main->save();
            return response()->json(
                ['message' => $issaved ? 'Items Updated Successfully' : 'Items Updated Failed'],
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
     * @param  \App\Models\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $main = Main::find($id);
        $isDeleted = $main->delete();
        if($isDeleted){
            return response()->json(['icon' => 'success' ,'title' => 'Success!' ,'text' => 'Deleted Successfuly' ,]
            ,Response::HTTP_OK);
        } else {
            return response()->json(['icon' => 'error' ,'title' => 'Failed!' ,'text' => 'Deleted Failed ' ,]
            ,Response::HTTP_BAD_REQUEST);
        }
    }
}
