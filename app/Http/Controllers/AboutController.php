<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = About::orderBy('created_at', 'DESC')->get();
        return view('admin.about.index', [
            'data' => $data,
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
        return view('admin.about.create');
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
            'image' => '',
        ]);
        if (!$validator->fails()) {
            $about = new About();
            $about->title = $request->input('title');
            $about->detail = $request->input('detail');
            if ($request->hasFile('image')){
                $image = time() .'.'.$request -> image->extension();
                $request->image->move(('project/uploads/about/'),$image);
                $about->image = $image;
            }

            $issaved = $about->save();
            return response()->json(
                ['message' => $issaved ? 'About Created Successfully' : 'About Created Failed'],
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
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $about = About::find($id);
        return view('admin.about.update', [
            'about' => $about
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = validator($request->all(), [
            'title' => 'required|string',
            'detail' => 'required|string',
        ]);
        if (!$validator->fails()) {
            $about = About::find($id);
            $about->title = $request->input('title');
            $about->detail = $request->input('detail');
            if ($request->hasFile('image')){
                $image = time() .'.'.$request -> image->extension();
                $request->image->move(('project/uploads/about/'),$image);
                $about->image = $image;
            }

            $issaved = $about->save();
            return response()->json(
                ['message' => $issaved ? 'About Updated Successfully' : 'About Updated Failed'],
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
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $about = About::find($id);
        $isDeleted = $about->delete();
        if($isDeleted){
            return response()->json(['icon' => 'success' ,'title' => 'Success!' ,'text' => 'Deleted Successfuly' ,]
            ,Response::HTTP_OK);
        } else {
            return response()->json(['icon' => 'error' ,'title' => 'Failed!' ,'text' => 'Deleted Failed ' ,]
            ,Response::HTTP_BAD_REQUEST);
        }
    }
}
